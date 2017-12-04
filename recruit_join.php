<?php
session_start();
// require "recruit_list_func.php";

$m_id = $_POST["m_id"];
$a_id = $_SESSION["a_id"];
try {

  $conn = new PDO(
   "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

  //参加者リストからすでに応募されているかチェック
  $check = $conn -> query('select * from app_users_list where m_id = '.$m_id);
  /*
    ↓の文はそもそも入っていなかった場合に実行するとエラーが起きるので、
    何も入っていなかった（falseが返ってきた）場合、無理やりtrueに変えてif文に突っ込ませる
  */
  $check = !$check ? true : $check;
  if($check){
    $checkData = $check -> fetchAll(PDO::FETCH_ASSOC);//連想配列に変更
    foreach ($checkData as $data) {
      if($data["a_id"] === $a_id ){//含まれていた場合はエラーを吐いてcatch文で無理やり終了
        throw new Exception('すでに応募しています');
        }
      }
  }

  $data = $conn -> query('select a_host_id,m_count from matching where m_id = '.$m_id);
  $a_data = "";
  $a_data = $data->fetch(PDO::FETCH_ASSOC);//$a_data["a_host_id"]で募集者アカウントID取得

  $stmt = $conn -> prepare('insert into talkroom values(null,:m_id,:a_host_id,:a_app_id)');
  $stmt -> bindValue(':m_id',$m_id,PDO::PARAM_INT);//それぞれの値を紐づけ
  $stmt -> bindValue(':a_host_id',$a_data["a_host_id"],PDO::PARAM_INT);
  $stmt -> bindValue(':a_app_id',$a_id,PDO::PARAM_INT);
  $stmt -> execute();

  $stmt = $conn -> prepare('insert into app_users_list values(?,?)');//参加者リストに保存
  $stmt -> bindValue(1,$m_id,PDO::PARAM_INT);
  $stmt -> bindValue(2,$a_id,PDO::PARAM_INT);
  $stmt -> execute();

  //参加者カウントアップ
  $countUp = $a_data["m_count"] + 1;

  $stmt = $conn -> prepare('update matching set m_count = ? where m_id = ?');
  $stmt -> bindValue(1,$countUp,PDO::PARAM_INT);
  $stmt -> bindValue(2,$m_id,PDO::PARAM_INT);
  $stmt -> execute();

} catch (Exception $e) {
  echo $e->getMessage();
  return false;
}

$conn = null;
// header("Location:recruit_list.php");
echo "応募しました";
 ?>
