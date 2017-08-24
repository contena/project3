<?php

function recruitListGet($word){
	//$word=$_GET["word"];
	$a_id = $_SESSION["a_id"];
	$conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

    // $data = $conn->query("select * from matching_list");
	if(isset($word)){
		$data=$conn->query("SELECT * from matching WHERE m_content LIKE '%".$word."%'");
	}else{
	$data = $conn->query('select * from matching where a_host_id != '.$a_id.'  order by m_id');
	}
	$conn = null;
	return $data;
}
function recruitApp(){

}

 ?>
