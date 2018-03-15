<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:http://c0ntena.php.xdomain.jp/test/title.html");
}

include "mypage_func.php";

$conn = getConnection();
$a_id = $_SESSION["a_id"];

$m_comp_id = $_POST["modal_m_comp_id"];
$rate = $_POST["rating"];//評価（数字）
$comment = $_POST["comment"];//コメント;

$check = checkReview($m_comp_id);
$stmt;
if($check == null){
  $stmt = $conn -> prepare('insert into review values(null,?,?,?,?)');
  $stmt -> bindValue(1,$m_comp_id,PDO::PARAM_INT);
  $stmt -> bindValue(2,$a_id,PDO::PARAM_INT);
  $stmt -> bindValue(3,$rate,PDO::PARAM_INT);
  $stmt -> bindValue(4,$comment,PDO::PARAM_STR);
}else{
  $stmt = $conn -> prepare('update review set rate = :rate ,comment = :comment where m_complete_id = :m_id and a_id = :a_id');
  $stmt -> bindValue(':m_id',$m_comp_id,PDO::PARAM_INT);
  $stmt -> bindValue(':a_id',$a_id,PDO::PARAM_INT);
  $stmt -> bindValue(':rate',$rate,PDO::PARAM_INT);
  $stmt -> bindValue(':comment',$comment,PDO::PARAM_STR);
}

$stmt -> execute();

$conn = null;
header('Location:mypage.php');
// header("Location:http://c0ntena.php.xdomain.jp/test/mypage.php");
 ?>
