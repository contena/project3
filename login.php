<?php

if(empty(session_id())){
	session_start();
}
include "connect.php";
$login=isset($_POST['loginid']) ? $_POST['loginid'] : '';
$password=isset($_POST['password']) ? $_POST['password'] : '';

$conn = getConnection();

$result=$conn->prepare("SELECT * FROM account WHERE a_login=:login");
$result->execute(array(':login'=>$login));
$r = $result->fetch();

$key='pitalink';

if(empty($r['a_login'])||empty($r['a_pass'])){//loginIDとpasswordが空もしくは間違っている場合
	echo("再入力してしてください");
	}else if($password==hash_equals(crypt($password,$key),$r['a_pass'])){//loginIDとpasswordが一致
		$_SESSION['a_login']=$r['a_login'];
		$_SESSION['a_id']=$r['a_id'];
		header("Location:recruit_list.php");//成功
		}else{
			echo("パスワードが違います");
			}
$conn=null;

?>
