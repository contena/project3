<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}
include "connect.php";

$conn = getConnection();

$userID = $_SESSION['a_id'];
$content = htmlspecialchars($_POST["content"],ENT_QUOTES);
$t_id = htmlspecialchars($_POST["t_id"],ENT_QUOTES);

date_default_timezone_set('UTC');

$stmt = $conn -> prepare('insert into talk values (:t_id,null,:t_host_id,:t_content,null)');
$stmt ->bindValue(':t_id',$t_id,PDO::PARAM_INT);
$stmt ->bindValue(':t_host_id',$userID,PDO::PARAM_INT);
$stmt ->bindValue(':t_content',$content,PDO::PARAM_STR);
// $stmt ->bindValue(':t_date',$date,PDO::PARAM_STR);
$stmt ->execute();

$conn = null;
header('Location:talk.php?t_id='.$t_id);
?>
