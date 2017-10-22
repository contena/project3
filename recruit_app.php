<?php
session_start();
$m_id = $_POST["m_id"];
$a_id = $_SESSION["a_id"];

$conn = new PDO(
 "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
$stmt = $conn -> prepare('insert into app_waiting values(:m_id,:a_id)');
$stmt ->bindValue(':m_id',$m_id,PDO::PARAM_INT);
$stmt ->bindValue(':a_id',$a_id,PDO::PARAM_INT);

$stmt ->execute();

$conn = null;
header("Location:recruit_list.php");

 ?>
