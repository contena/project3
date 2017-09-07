<?php
session_start();
$self_a_id = $_SESSION["a_id"];//自分のID
$target_a_id = $_POST["a_id"];//相手のID　変えるかも

$mode = $_POST["mode"];
$conn = new PDO(
 "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");



 $stmt ->execute();
 $conn = null;
 header("Location:recruit_list.php");
 ?>
