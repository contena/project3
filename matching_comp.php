<?php
session_start();
include "connect.php";

$conn = getConnection();
$a_id = $_SESSION["a_id"];
$m_id = $_POST["m_id"];
/*
手順
m_idを受け取り、その内容を取得
matchingのa_host_idとa_idを比べて同じなら完了操作実行
違えば何もしない
  完了操作
  ,matching_completeにmatchingの内容をコピー
*/
try{
  $data = $conn -> query('select * from matching where m_id = '.$m_id);

  $m_data = $data->fetch(PDO::FETCH_ASSOC);//$a_data["a_host_id"]で募集者アカウントID取得
  if($m_data["a_host_id"] == $a_id){
    $stmt = $conn -> prepare('insert into matching_complete values(null,?,?,?,?,?,?)');
    $stmt -> bindValue(1,$m_data["m_id"],PDO::PARAM_INT);
    $stmt -> bindValue(2,$m_data["a_host_id"],PDO::PARAM_INT);
    $stmt -> bindValue(3,$m_data["m_date"],PDO::PARAM_STR);
    $stmt -> bindValue(4,$m_data["m_count"],PDO::PARAM_INT);
    $stmt -> bindValue(5,$m_data["m_title"],PDO::PARAM_STR);
    $stmt -> bindValue(6,$m_data["m_content"],PDO::PARAM_STR);
    $stmt -> execute();

    $registedId = $conn->lastInsertId('m_complete_id');//最後に追加されたIDを取得
    $stmt = $conn -> prepare('delete from matching where m_id = '.$m_id);
    $stmt -> execute();

    $data = $conn -> query('select * from app_users_list where m_id = '. $m_id);
    $app_data = $data -> fetchAll(PDO::FETCH_ASSOC);
    $stmt = $conn -> prepare('insert into matching_comp_app_list values('.$registedId.',?)');
    foreach ($app_data as $a) {
      $stmt -> bindValue(1,$a["a_id"]);
      $stmt -> execute();
    }
    $stmt = $conn -> prepare('delete from app_users_list where m_id = '.$m_id);
    $stmt -> execute();
  }else{
    throw new Exception("エラー");
  }
}catch(Exception $e){
  echo $e->getMessage();
  return false;
}
$conn = null;
header('Location:mypage.php');
// echo '募集を終了しました';
 ?>
