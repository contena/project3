<?php

function recruitListGet(){
  $conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

    // $data = $conn->query("select * from matching_list");
    $data = $conn->query('select * from matching where a_host_id != '.$_SESSION["a_id"].'  order by m_id');
    $conn = null;
    return $data;
}

 ?>
