<?php
session_start();
// require "recruit_list_func.php";

$m_id = $_POST["m_id"];
$a_id = $_SESSION["a_id"];

$conn = new PDO(
 "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

$data = $conn -> query('select a_host_id from matching where m_id = '.$m_id);
$a_data = "";
$a_data = $data->fetch(PDO::FETCH_ASSOC);//$a_data["a_host_id"]で募集者アカウントID取得
// $data->close();

$stmt = $conn -> prepare('insert into talkroom values(null,:m_id,:a_host_id,:a_app_id)');
$stmt ->bindValue(':m_id',$m_id,PDO::PARAM_INT);//それぞれの値を紐づけ
$stmt ->bindValue(':a_host_id',$a_data["a_host_id"],PDO::PARAM_INT);
$stmt ->bindValue(':a_app_id',$a_id,PDO::PARAM_INT);
$stmt ->execute();

$conn = null;
header("Location:recruit_list.php");

 ?>
