<?php
// echo phpversion('tidy');
$conn = new PDO(
  "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

$data = $conn->query('select * from talkroom where t_id = 7');
$data = $data->fetchAll();
$page = $conn->query('select count(m_id) from matching where a_host_id != 2');
$page = $page->fetchAll();
echo $page[0][0];
echo (var_dump($page));
foreach ($page as $p) {
  # code...
  echo $p[0];
}
// echo ($page[0]["count(m_id)"]);
// echo ($data[0]["a_host_id"]);
if(empty($data)){
  echo "empty";
}else{
  echo "not empty";
}
// echo (var_dump($data));
?>
