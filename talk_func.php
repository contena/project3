<?php

function getTalkList(){
  $a_id = $_SESSION["a_id"];

  $conn = new PDO(
      "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
  $roomData = $conn->query('select * from talkroom where a_host_id = '.$a_id.' or a_app_id = '.$a_id.'  order by t_id');
  //↑だと自分が募集者側か応募者側か分からない？のでt_idからa_host_idとa_app_idを見て自分がどちらか判断する
  //fetchAllを使って複数取得
  $talk = $roomData->fetchAll();//自分がいるt_idを取得する
  /*
  必要なもの（何を取得するか）
  m_idからm_title m_id->m_host_id or a_app_idから相手の名前 さらにprofileからp_icon(まだいい)
  */
  //$talk[i]["t_id"]でトークID取得;
  $returnArray = array();//return用
  $myid = "";
  for($i=0; $i<count($talk);$i++){
    $getid =$conn->query('select a_host_id,a_app_id from talkroom where t_id = '.$talk[$i]["t_id"]);
    $whichmyid = $getid->fetch(PDO::FETCH_ASSOC);
  if($whichmyid["a_host_id"] == $a_id){//相手の情報をとるため逆になる
    $myid = $whichmyid["a_app_id"];
  }else{
    $myid = $whichmyid["a_host_id"];
  }
    $data = $conn->query('select t_id,(select m_title from matching m where m.m_id = t.m_id) as m_title,
    (select a_name from account where a_id = '.$myid.') as a_name  from talkroom t  where t_id = '.$talk[$i]["t_id"]);
    //トークID、マッチングタイトル、相手の名前とかを取得
    //本来はプロフィールのnickname 自分がどっちかを把握しよう
    array_push($returnArray,$data->fetch(PDO::FETCH_ASSOC));//連想配列を配列にプッシュ
  }
  $conn = null;
  return $returnArray;
  }

function getTalkContent($t_id){
  $conn = new PDO(
      "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
  $check = $conn->query('select * from talkroom where t_id ='.$t_id);
  $check = $check->fetchAll();
  //中身が空か、その部屋のIDじゃなかったら飛ばす
  if(empty($check) || $check[0]["a_host_id"] !== $_SESSION["a_id"] && $check[0]["a_app_id"] !== $_SESSION["a_id"]){
    echo  ('<script>window.location.href="recruit_list.php"</script>');
    return false;
  }else{
    $data = $conn->query('select t_host_id, t_content, t_date from talk where t_id = '.$t_id.' order by t_content_id');
    $conn = null;
    return $data;
  }
}
 ?>
