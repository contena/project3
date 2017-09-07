<?php

function recruitListGet(){
  $a_id = $_SESSION["a_id"];
  $conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

    // $data = $conn->query("select * from matching_list");
  $data = $conn->query('select * from matching where a_host_id != '.$a_id.'  order by m_id');
  $conn = null;
  return $data;
}

function recruitAppList(){
  $a_id = $_SESSION["a_id"];
  $conn = new PDO(
    "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
    /*
    必要なもの
    相手のa_id←app_waitingから取得
    自分のa_idを持ったm_id←重要 app_waitingのm_idから取得
    */
    /*
    お手本
    select m.m_title ,ac.a_name
  from app_waiting a left join matching m on a.m_id = m.m_id left join account ac on a.a_id = ac.a_id
  where a.a_id = 3
    */
  $data = $conn ->query('select m.m_title ,ac.a_name
  from app_waiting a left join matching m on a.m_id = m.m_id left join account ac on a.a_id = ac.a_id
  where a.a_id ='.$a_id);
  $conn = null;
  return $data;

}

 ?>
