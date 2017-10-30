<?php

function recruitListGet(){
  $a_id = $_SESSION["a_id"];
  $how = htmlspecialchars("m_".$_GET["how"],ENT_QUOTES);//何を検索するか
  $sort = htmlspecialchars("m_".$_GET["sort"],ENT_QUOTES);//並び替え
  $word = htmlspecialchars($_GET["word"],ENT_QUOTES);//検索ワード
  $page = htmlspecialchars($_GET["page"],ENT_QUOTES);//ページ
  $page = $page == 1 ? $page : $page *10 - 9; //データベースから取得するときの開始行数を指定　ページが1のときはそのまま　それ以外の場合は10倍して-9
  $conn = new PDO(
  	"mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");

  if($word !== ""){//↓みづらい　いずれも部分一致検索
    if($how == "m_content"){//内容（紹介文？）を使った検索
      $data=$conn->query("SELECT * from matching WHERE ".$how." LIKE '%".$word."%' and a_host_id != ".$a_id." order by ".$sort." limit ".$page." ,10 ");
    }else if ($how == "m_tag"){//タグを利用した検索
      $data=$conn->query("SELECT * from matching m left join skill_tag s on m.m_id = s.m_id
                          WHERE skill LIKE '%".$word."%' and a_host_id != ".$a_id." order by ".$sort." limit ".$page." ,10");
    }
  }else{
    $data = $conn->query('select * from matching where a_host_id != '.$a_id.' order by m_id limit '.$page.',10');
  }
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

function getTag($m_id){
  $conn = new PDO(
    "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
    $data = $conn->query('select * from skill_tag where m_id = '. $m_id .'');
    return $data;
}

function getPageNum(){//ページの番号を取得
  $page = $_GET["page"];
  $how = htmlspecialchars("m_".$_GET["how"],ENT_QUOTES);//何を検索するか
  $sort = htmlspecialchars("m_".$_GET["sort"],ENT_QUOTES);//並び替え
  $word = htmlspecialchars($_GET["word"],ENT_QUOTES);//検索ワード
  $a_id = $_SESSION["a_id"];

  $conn = new PDO(
    "mysql:host=localhost;dbname=pitalinkdb;charset=utf8","root","");
  if($word !== ""){//↓みづらい　いずれも部分一致検索
    if($how == "m_content"){//内容（紹介文？）を使った検索
      $data = $conn->query("SELECT count(m_id) from matching WHERE ".$how." LIKE '%".$word."%' and a_host_id != ".$a_id." order by ".$sort);
    }else if ($how == "m_tag"){//タグを利用した検索
      $data = $conn->query("SELECT count(a_host_id) from matching m left join skill_tag s on m.m_id = s.m_id
                            WHERE skill LIKE '%".$word."%' and a_host_id != ".$a_id." order by ".$sort);
    }
    }else{
        $data = $conn->query('select count(m_id) from matching where a_host_id != '.$a_id);
    }

  $data = $data->fetchAll();

  // echo var_dump($data);
  return $data[0][0];//ページの件数をリターン
}
 ?>
