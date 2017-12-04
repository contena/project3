<?php
session_start();
// if($_SESSION["a_id"] == null){
//   header("Location:title.html");
// }
// if(empty(session_id())){

// }

$loginID=$_SESSION['a_id'];

$title = isset($_POST['title']) ? $_POST['title'] : '';
// $content = $_POST["content"];
// $content = str_ireplace('<script>','すくりぷと',$content);
// $content = str_ireplace('</script>%','すらすくりぷと',$content);
$content = nl2br(htmlspecialchars($_POST['content'],ENT_QUOTES));


$tag = $_POST['tag'];
$count = 0;
$complete = 0;

$conn = new PDO(
	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");//DB接続


if(strlen($content)>500){//内容が500文字より多い場合
		echo("500文字までに抑えてください。");
}
$updated=$conn->prepare("INSERT INTO matching VALUES (NULL,:hostid,NULL,:count,:tag,:title,:content,:complete)");
$updated->execute(array(':hostid'=>$loginID,':count'=>$count,':tag'=>$tag,':title'=>$title,':content'=>$content,':complete'=>$complete));

for($i = 0;$i < count($tag);$i++){
	$stmt = $conn -> prepare('insert into skill_tag values(
		(select max(m_id) from matching),:skill)');
	$stmt ->bindValue(':skill',$tag[$i],PDO::PARAM_STR);//それぞれの値を紐づけ
	$stmt ->execute();
}


$conn = null;

?>
