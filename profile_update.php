<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}
include "connect.php";

$conn = getConnection();

$a_id = $_SESSION["a_id"];
$selfproduce =  htmlspecialchars($_POST["selfproduce"],ENT_QUOTES);//自己紹介取得
$age = htmlspecialchars($_POST["age"],ENT_QUOTES);//年齢
$skill = htmlspecialchars($_POST["skill"],ENT_QUOTES);//スキル？
$address = htmlspecialchars($_POST["address"],ENT_QUOTES);//住所
$line = htmlspecialchars($_POST["line"],ENT_QUOTES);//line

$stmt = $conn -> prepare('update profile set p_selfproduce = :selfproduce,age = :age,
                  p_skill = :p_skill,p_address = :address,line = :line where a_id = :a_id');
//ひたすらバインド
$stmt ->bindValue(':selfproduce',$selfproduce,PDO::PARAM_STR);
$stmt ->bindValue(':age',$age,PDO::PARAM_INT);
$stmt ->bindValue(':p_skill',$skill,PDO::PARAM_STR);
$stmt ->bindValue(':address',$address,PDO::PARAM_STR);
$stmt ->bindValue(':line',$line,PDO::PARAM_STR);
$stmt ->bindValue(':a_id',$a_id,PDO::PARAM_INT);


$stmt->execute();
$conn = null;
// echo 'alert("変更しました");';
// echo '<script>alert('.$selfproduce.')</script>;';

header('Location:mypage.php');
// exit();


 ?>
