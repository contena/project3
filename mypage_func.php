<?php
function getProf(){
  $conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");//DB接続

  $a_id = $_SESSION["a_id"];
  $data = $conn -> query('select * from profile where '.$a_id);
  $conn = null;
  return $data;
}

function editProf(){//編集完了ボタンが押されたときに呼び出し
  $conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");//DB接続

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

funtion editIcon() {//アイコン画像のアップロード
  $conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");//DB接続
    $a_id = $_SESSION["a_id"];

    $newFileName = date("YmdHis".$_FILES["image"]["name"]);
    $filePath = './images/'. $newfilename;

    //画像アップロード処理
    $result = imgComp($newFileName);
    if($result){
      $stmt = $conn -> prepare('update profile set p_icon = :icon where a_id = '.$a_id.' ');//画像へのパスを変更
      $stmt ->bindValue(':icon',$filename,PDO::PARAM_STR);
      $stmt ->execute();
      $conn = null;
      return "アイコンを変更しました";
    }else{
      return "エラーが発生しました";
    }


  }

  function imgComp($newfilename){
    // $newfilename = date("YmdHis")."-".$_FILES['image']['name'];
    // $filePath = './img/'. $newfilename;

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

 ?>
