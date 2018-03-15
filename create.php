<?php
include 'connect.php';

$name=isset($_POST['name']) ? $_POST['name'] : '';
$mail=isset($_POST['address']) ? $_POST['address'] : '';
$login=isset($_POST['loginid']) ? $_POST['loginid'] : '';
$password=isset($_POST['password']) ? $_POST['password'] : '';
$p_selfproduce = "よろしくお願いします。";

$conn = getConnection();

$result=$conn->prepare("SELECT * FROM account WHERE a_login=:login");
$result->execute(array(':login'=>$login));
$r = $result->fetch();

if(empty($name)||empty($mail)||empty($login)||empty($password)||strpos($name,' ')!==false||strpos($mail,' ')!==false||strpos($login,' ')!==false||strpos($password,' ')!==false){//空と空白があった場合
	echo("再入力してください");
}else if($r['a_login']===$login){//ログインIDがすでに使用されている場合
		echo("そのログインIDはすでに使用されています");
		}else if(strlen($name)>20||strlen($login)>20||strlen($password)>20){//名前・ログインID・パスワードが20文字を超えていた場合
			echo("名前・ログインID・パスワードは20文字までにしてください");
			}else if(strlen($mail)>50){//メールアドレスが５０文字を超えていた場合
					echo("メールアドレスは50文字までにしてください");
				}else{
					$key='pitalink';
					$passhidden=crypt($password,$key);//パスワードの暗号化
          $stmt = $conn -> prepare('insert into account values(null,?,?,?,?)');
          $stmt ->bindValue(1,$mail,PDO::PARAM_STR);
          $stmt ->bindValue(2,$name,PDO::PARAM_STR);
          $stmt ->bindValue(3,$login,PDO::PARAM_STR);
          $stmt ->bindValue(4,$passhidden,PDO::PARAM_STR);
          $stmt->execute();
					// $result=$conn->prepare("INSERT INTO account VALUES(NULL,:mail,:name,:login,:password)");
					// $result->execute(array(':mail'=>$mail,':name'=>$name,':login'=>$login,':password'=>$passhidden));

          $registedId = $conn->lastInsertId();//最後に追加されたIDを取得してプロフィールの初期値を挿入
          $prof = $conn -> prepare('insert into profile values(:a_id,:p_nickname,:p_selfproduce,:p_sex,:age,:p_skill,:p_icon,null,0,"未入力")');
          $prof ->bindValue(':a_id',$registedId,PDO::PARAM_INT);//それぞれの値を紐づけ
          $prof ->bindValue(':p_nickname',$name,PDO::PARAM_STR);
          $prof ->bindValue(':p_selfproduce',$p_selfproduce,PDO::PARAM_STR);
          $prof ->bindValue(':p_sex','0',PDO::PARAM_INT);
          $prof ->bindValue(':age',null,PDO::PARAM_NULL);
          $prof ->bindValue(':p_skill',"",PDO::PARAM_STR);
          $prof ->bindValue(':p_icon',"./user_icon_default.jpg",PDO::PARAM_STR);

          $prof ->execute();
          echo "登録に成功しました";
				}
$conn=null;


?>
