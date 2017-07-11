<?php
if(empty(session_id())){
	session_start();
}
$login=$_POST{a_login};
$password=$_POST{a_pass};

$conn = new PDO(
	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

$result=$conn->prepare("SELECT * FROM account WHERE login=:login");
$result->execute(array(':login'=>$login));	
$r = $result->fetch();

if(empty($r['a_login'])||empty($r['a_pass'])){//loginIDとpasswordが空の場合
	echo("再入力してしてください");
	}else if($r['a_pass']==$pass){//loginIDとpasswordが一致
		$_SESSION['a_login']=$r['a_login'];
		}else{
			echo("パスワードが違います");
			}
$conn=null;
?>