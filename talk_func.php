<?php

function getTalkList(){
$a_id = 2;

$conn = new PDO(
    "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
$roomData = $conn->query('select * from talkroom where a_host_id = '.$a_id.' or a_app_id = '.$a_id.'  order by t_id');
//↑だと自分が募集者側か応募者側か分からない？のでm_idからm_host_idを見て自分がどちらか判断する
//fetchAllを使って複数取得
$talk = $roomData->fetchAll();//自分がいるt_idが返ってくる
/*
必要なもの（何を取得するか）
m_idからm_title m_id->m_host_id or a_app_idから相手の名前 さらにprofileからp_icon(まだいい)
*/
echo count($talk);
// for($i=0; $i<count($talk);$i++){
//
// }

}
 ?>
