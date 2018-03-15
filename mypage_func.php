<?php
include 'connect.php';


function getProf(){
  $conn = getConnection();


  $a_id = $_SESSION["a_id"];
  $data = $conn -> query('select * from profile where a_id = '.$a_id);
  // $data -> bindValue(':a_id',$a_id,PDO::PARAM_INT);
  $conn = null;
  return $data;
}

function editProf(){//編集完了ボタンが押されたときに呼び出し
  $conn = getConnection();

  $a_id = $_SESSION["a_id"];
  // $selfproduce =  //自己紹介取得
  // $sex = //性別
  // $age = //年齢
  // $skill = //スキル？
  // $address = //住所

  $stmt = $conn -> prepare('update profile set p_selfproduce = :selfproduce, p_sex = :sex ,age = :age ,
                    p_skill = :skill,p_address = :address where a_id = :a_id');
  //ひたすらバインド
  $stmt ->bindValue(':selfproduce',$selfproduce,PDO::PARAM_STR);
  $stmt ->bindValue(':sex',$sex,PDO::PARAM_INT);
  $stmt ->bindValue(':age',$age,PDO::PARAM_INT);
  $stmt ->bindValue(':skill',$skill,PDO::PARAM_STR);
  $stmt ->bindValue(':address',$address,PDO::PARAM_STR);
  $stmt ->bindValue(':a_id',$a_id,PDO::PARAM_INT);

  $stmt->execute();
  $conn = null;
  header('Location::mypage.php');
  exit();
}

function editIcon() {//アイコン画像のアップロード
    $conn = getConnection();
    $a_id = $_SESSION["a_id"];
    // $_FILES["image"]["name"] = trim($_FILES["image"]["name"]);
    $newFileName = date("YmdHis".$a_id);
    $size = filesize($newFileName);
    // if($size >= 500000){
    //   header("Location:mypage.php");
    // }
    $filePath = './p_icon/'. $newfilename;

    //画像アップロード処理
    $result = imgComp($newFileName);
    if($result){
      $stmt = $conn -> prepare('update profile set p_icon = :icon where a_id = '.$a_id.' ');//画像へのパスを変更
      $stmt ->bindValue(':icon',$newFileName,PDO::PARAM_STR);
      $stmt ->execute();
      $conn = null;
      return "アイコンを変更しました";
    }else{
      return "エラーが発生しました";
    }

  }

  function imgComp($newfilename){

    $width = 300;//横幅指定
    $height = 400;//縦幅指定

    $canvas = imagecreatetruecolor($width,$height);

    $img = getimagesize($_FILES["image"]["tmp_name"]);

    $type = image_type_to_extension($img[2]);//MIMEタイプの取得
    echo $type;

    $targetImage = $_FILES["image"]["tmp_name"];
    $image;
    if($type == ".jpeg"){
      $image = imagecreatefromjpeg($targetImage);
    }else if($type == ".png"){
      $image = imagecreatefrompng($targetImage);
    }else{
      return false;
    }

    list($image_w,$image_h) = getimagesize($targetImage);

    imagecopyresampled($canvas,  // 背景画像
                       $image,   // コピー元画像
                       0,        // 背景画像の x 座標
                       0,        // 背景画像の y 座標
                       0,        // コピー元の x 座標
                       0,        // コピー元の y 座標
                       $width,   // 背景画像の幅
                       $height,  // 背景画像の高さ
                       $image_w, // コピー元画像ファイルの幅
                       $image_h  // コピー元画像ファイルの高さ
                      );

                      imagejpeg($canvas,           // 背景画像
                                './img/'.$newfilename,    // 出力するファイル名（省略すると画面に表示する）
                                100                // 画像精度（この例だと100%で作成）
                               );

    imagedestroy($canvas);
    return true;
  }

function getRecruiting(){
  $conn = getConnection();
  $a_id = $_SESSION["a_id"];

  $data = $conn -> query('select * from matching where a_host_id = '.$a_id);
  $conn = null;
  return $data;
}

function matchingCompleted(){
  $conn = getConnection();
  $a_id = $_SESSION["a_id"];
  /*
  手順
  m_idを受け取り、その内容を取得
  matchingのa_host_idとa_idを比べて同じなら完了操作実行
  違えば何もしない
    完了操作
    ,matching_completeにmatchingの内容をコピー
  */
}

function getApplying(){
  $conn = getConnection();
  $a_id = $_SESSION["a_id"];

  $data = $conn -> query('select * from matching m left join app_users_list a on m.m_id = a.m_id
                          left join profile p on a.a_id = p.a_id
                          where a.a_id = '.$a_id);
  $conn = null;
  return $data;
}

function getCompleteMatch(){
  $conn = getConnection();
  $a_id = $_SESSION["a_id"];

  $data = $conn -> query('select * from matching_complete m left join matching_comp_app_list a on m.m_complete_id = a.m_complete_id
                          left join profile p on m.a_host_id = p.a_id
                            where a.a_id = '.$a_id);
  // $data = $data -> fetchAll();
  $data = $data == false ? null : $data;
  $conn = null;
  return $data;
}

function getMyCompleteRec(){
  $conn = getConnection();
  $a_id = $_SESSION["a_id"];

  $data = $conn -> query('select * from matching_complete where a_host_id = '.$a_id);
  // $data = $data -> fetchAll();
  $data = $data == false ? null : $data;
  $conn = null;
  return $data;
}
function recGet($m_id){
  // $m_id = htmlspecialchars($_GET["m_id"],ENT_QUOTES);
  $conn = getConnection();

  $data = $conn -> query('select * from matching_complete m left join profile p on m.a_host_id = p.a_id where m_complete_id = '.$m_id);
  $data = $data -> fetch();
  $conn = null;
  return $data;
}
function getTag($m_id){
    $conn = getConnection();
    $data = $conn->prepare('select * from skill_tag s left join matching_complete m on s.m_id = m.m_id where s.m_id = :m_id ');
    $data ->bindValue(':m_id',$m_id,PDO::PARAM_INT);
    $data ->execute();
    return $data;
}

function getReview($mcid){
  $conn = getConnection();
  $a_id = $_SESSION["a_id"];
  // $data = $conn -> query('select * from matching_complete m left join review r on m.m_complete_id = r.m_complete_id
                          // where m.a_host_id = '.$a_id);
  $data = $conn -> query('SELECT * FROM review r left join matching_complete mc on r.m_complete_id = mc.m_complete_id
                        left join profile p on r.a_id = p.a_id
				                where  r.m_complete_id = '.$mcid);
  // $data = $data -> fetchAll();
  $data = $data == false ? null : $data;
  $conn = null;
  return $data;
}

function checkReview($id){
    $conn = getConnection();
    $a_id = $_SESSION["a_id"];
    $data = $conn->query('select * from review where m_complete_id = '.$id.' and a_id = '.$a_id);
    $conn = null;
    $data = $data->fetch();

    return $data;
}


function doReview(){
  $conn = getConnection();

  $a_id = $_SESSION["a_id"];

  $m_comp_id = $_POST["id"];
  $rate = $_POST["rate"];//評価（数字）
  $comment = $_POST["comment"];//コメント;


  $stmt = $conn -> prepare('insert into review values(null,?,?,?,?)');
  $stmt -> bindValue(1,$m_comp_id,PDO::PARAM_INT);
  $stmt -> bindValue(2,$a_id,PDO::PARAM_INT);
  $stmt -> bindValue(3,$rate,PDO::PARAM_INT);
  $stmt -> bindValue(4,$comment,PDO::PARAM_STR);
  $stmt -> execute();

  $conn = null;
}

function leaveMatching(){
  $conn = getConnection();

  $a_id = $_SESSION["a_id"];
  $m_id = $_POST["m_id"];

  $stmt = $conn -> prepare('delete from app_users_list where m_id = ? and a_id = '.$a_id);
  $stmt -> bindValue(1,$m_id,PDO::PARAM_INT);
  $stmt -> execute();

  $stmt = $conn -> prepare('delete from talk where t_id = (select t_id from talkroom where m_id = ? and a_app_id = '. $a_id .')');
  $stmt -> bindValue(1,$m_id,PDO::PARAM_INT);
  $stmt -> execute();

  $stmt = $conn -> prepare('delete from talkroom where m_id = ? and a_app_id = '.$a_id);
  $stmt -> bindValue(1,$m_id,PDO::PARAM_INT);
  $stmt -> execute();

  $conn= null;

}
 ?>
