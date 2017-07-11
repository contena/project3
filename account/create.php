<?php
$account=isset($_POST['a_id']) ? $_POST['a_id'] : '';
$mail=isset($_POST['a_mail']) ? $_POST['a_mail'] : '';
$login=isset($_POST['a_login']) ? $_POST['a_login'] : '';
$password=isset($_POST['a_pass']) ? $_POST['a_pass'] : '';

$conn = new PDO(
	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
	
$result=$conn->prepare("SELECT * FROM account WHERE a_login=:login");
$result->execute(array(':login'=>$login));
$r = $result->fetch();

if(empty($mail)||empty($login)||empty($password)||strpos($mail,' ')!==false||strpos($login,' ')!==false||strpos($password,' ')!==false){//空と空白があった場合
	echo("再入力してください");
	}else if($r['a_login']==$login){//ログインIDがすでに使用されている場合
		echo("そのログインIDはすでに使用されています");
		}else if(strlen($mail)=>50||strlen($login)>20||strlen($password)>20||){
			echo("ログインIDとパスワードは20文字以内にしてください");
			}else{
			$result=$conn->prepare("INSERT INTO account VALUES(NULL,:mail,:name,:login,:password)");
			$result->execute(array(':mail'=>$mail,':name'=>$name,':login'=>$login,':password'=>$password));
			echo("登録完了しました");
			}
$conn=null;
?>