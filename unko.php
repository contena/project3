<?php
$conn = new PDO(
  "mysql:host=localhost;dbname=unko;charset=utf8","root","");
  // $stmt = $conn -> prepare('insert into test values(null,"aaaa") ');
  // $sql = 'insert into test values(null,"aaaa") ';
  $stmt = $conn -> prepare('insert into test values(null,"wafag")');
  $stmt->execute();
  // mysqli_query($conn,$sql);
  // $stmt->execute();
  // $id = $conn->id;
  // echo ($conn->lastInsertId());
  // echo(mysqli_insert_id($conn));
  // echo ("id".$id);
  $n = 5;
  for($i = $n;$i < 10;$i++){
    echo $i;
  }
 ?>
