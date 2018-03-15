<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}
include "connect.php";
editIcon();

function editIcon() {//アイコン画像のアップロード
    $conn = getConnection();
    $a_id = $_SESSION["a_id"];
    $newFileName = date("YmdHis").'_'.$a_id;
    $filePath = './p_icon/'. $newFileName;

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime_type = $finfo->file($_FILES["image"]["tmp_name"]);


    switch($mime_type){
    //jpegの場合
    case 'image/jpeg':
        $check = true;
        break;
    //pngの場合
    case 'image/png':
        $check = true;
        // echo "ok";
        break;
    default:
    $check = false;
    // echo "dame";
}
    $result;

    //画像アップロード処理
    if($check){
      $result = imgComp($newFileName);
    }else{
      return null;
    }
    if($result){
      $fileName = $conn -> query('select p_icon from profile where a_id = '.$a_id);
      $fileName = $fileName -> fetch();
      if($fileName["p_icon"] != "./user_icon_default.jpg"){
        unlink("./p_icon/".$fileName["p_icon"]);
      }

      $stmt = $conn -> prepare('update profile set p_icon = :icon where a_id = '.$a_id.' ');//画像へのパスを変更
      $stmt ->bindValue(':icon',$newFileName,PDO::PARAM_STR);
      $stmt ->execute();
      $conn = null;

      header("Location:mypage.php");
      // return "アイコンを変更しました";
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
    // echo $type;

    $targetImage = $_FILES["image"]["tmp_name"];
    $image;
    if($type === ".jpeg"){
      $image = imagecreatefromjpeg($targetImage);
      // echo "jpegggggg";
    }else if($type === ".png"){
      // echo "pnggggggggggggg";
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
                                './p_icon/'.$newfilename,    // 出力するファイル名（省略すると画面に表示する）
                                100                // 画像精度（この例だと100%で作成）
                               );

    imagedestroy($canvas);
    return true;
  }

 ?>
