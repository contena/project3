<?php

if(empty(session_id())){
	session_start();
}
	
$loginID=$_SESSION['a_id'];

$title=isset($_POST['title']) ? $_POST['title'] : '';
$content=isset($_POST['content']) ? $_POST['content'] : '';
$tag=isset($_POST['tag']) ? $_POST['tag'] : '';
$count=0;
$complete=0;

$conn = new PDO(
	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");//DB接続

	
if(strlen($content)>500){//内容が500文字より多い場合
		echo("500文字までに抑えてください。");
}
$updated=$conn->prepare("INSERT INTO matching VALUES (NULL,:hostid,NULL,:count,:tag,:title,:content,:complete)");
$updated->execute(array(':hostid'=>$loginID,':count'=>$count,':tag'=>$tag,':title'=>$title,':content'=>$content,':complete'=>$complete));
echo("成功");
$conn=null;

?>