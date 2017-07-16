<?php

if(empty(session_id())){
	session_start();
}

$conn = new PDO(
	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");//DB接続
	
$userID=$_SESSION['a_id'];

date_default_timezone_set('UTC');

$host=isset($_POST['a_host_id']) ? $_POST['a_host_id'] : '';
$whom=isset($_POST['a_id']) ? $_POST['a_id'] : '';
$text=isset($_POST['t_content']) ? $_POST['t_content'] : '';
$date=date('H:i');
$matching=$_SESSION['m_id'];

/*if(){//トーク送信したのがhostの場合
	$talkhost=$host;
	}else{//トーク送信したのがhostじゃない場合
		$talkhost=$whom
		}*/
echo($date);
$updated = $conn->prepare("INSERT INTO talk VALUES (NULL,:host,:whom,:talkhost,:content,NULL,matching)");
$updated->execute(array(':host'=>$host,':whom'=>$whom,':talkhost'=>$talkhost,':content'=>$text,':matching'=>$matching));
$conn=null;

?>