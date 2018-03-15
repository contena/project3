<?php

function getConnection(){
  // $conn = new PDO(
    // "mysql:host=mysql1.php.xdomain.ne.jp;dbname=c0ntena_pitalinkdb;charset=utf8","c0ntena_haco","hs5741sa");//DB接続
  $conn = new PDO(
    "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
    return $conn;
}
 ?>
