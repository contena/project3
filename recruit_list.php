<?php
  session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}

  include "recruit_list_func.php";
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <title>募集一覧</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/recruit_list.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/non-responsive.css">
<script src="./JS/jquery-2.1.3.js"></script>
<script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script>
$(function(){
  $(document).on("click",".sendButton",function(){
    var m_id = $(this).parent().parent().find("input:hidden").val();
    console.log(m_id);
    console.log("haa");
    $.ajax({
      type : 'post',
      url : "recruit_join.php",
      data :{ 'm_id' : m_id },
      success:function(html){
        alert(html);
        location.reload(true);
      }
    });
  });
});
</script>
</head>
<body>
  <header>
    <nav>
      <ul class="list-group">
        <li class="list-group-item img-top"><img src="pitalink.gif"  height="50" alt=""></li>
        <li class="list-group-item"><a href="mypage.php">プロフィール</a></li>
        <li class="list-group-item"><a href="recruit_start.php">募集する</a></li>
        <li class="list-group-item"><a href="recruit_list.php">検索する</a></li>
        <li class="list-group-item"><a href="talk.php">トークする</a></li>
        <li class="list-group-item" id="submitbutton"> <form action="logout.php" method="post"><input type="submit" value="ログアウト" /></form></li></ul>
    </nav>
  </header>
	<main role="main">
    <hr>
    <div id="search" class="form-group">
      <form action="recruit_list.php" method="GET" class="form-inline">
          <select class="form-control" name="how" id="how">
            <option value="tag">タグ</option>
            <option value="content">内容</option>
          </select>
          <select class="form-control" name="sort" id="sort">
            <option value="count">応募数</option>
            <option value="id">募集順</option>
          </select>
          <input class="form-control" type="text" name="word" value="">
          <input class="btn btn-default" type="submit" value="検索">
      </form>
    </div>
    <div class="list-group">
      <?php
        $_GET["word"] = (isset($_GET["word"])) ? $_GET["word"] : "";
        $_GET["how"] = (isset($_GET["how"])) ? $_GET["how"] : "";
        $_GET["sort"] = (isset($_GET["sort"])) ? $_GET["sort"] : "";
        $_GET["page"] = (isset($_GET["page"])) ? $_GET["page"] : 1;

        $recruit_list = recruitListGet();
        foreach ($recruit_list as $r) {
          $tag = getTag($r['m_id']);
          echo '
           <div>
            <div class="list-group-item list">
              <div class="list-icon"><a href="view_profile.php?a_id='.$r["a_host_id"].'">
                '; $icon = getIcon($r["a_host_id"]); echo '
                <img src="./p_icon/'.$icon["p_icon"].'" width="100" height="150">
              </a></div>
              <div class="list-content">
                <span class="title">
                  '.$r["m_title"].'
                </span>
                <div class="content">
                  '.$r["m_content"].'
                </div>
                <span class="tag">';
                  foreach ($tag as $t) {
                    echo '<a href="recruit_list.php?how=tag&sort=count&word='.$t["skill"].'"><img src="tag.png">'.$t["skill"].'</a>';
                  }
              echo '</span>
                  <span class="count">応募者数：'.$r["m_count"].'</span>
                <div class="send">
                  <a href="information.php?m_id='.$r["m_id"].'">詳細を見る</a>
                </div>
                  <input type="hidden" class="m_id" name="m_id" value="'.$r["m_id"].'">
              </div>
            </div>
            </div>
          ';
        }
       ?>
    </div>
    <div class="move page">
      <ul class="pagination page">
        <?php
          echo '<li class=""><a href="recruit_list.php?how='.$_GET["how"].'&sort='.$_GET["sort"].'&word='.$_GET["word"].'&page=1">&laquo;</a></li>';

          $pageNum = getPageNum();//ページの件数を取得
          $pageNum = $pageNum % 10 == 0 ? $pageNum -10 : $pageNum;//十で割り切れる数だった場合は無理やり数合わせ
          $pageNum = $pageNum == 0 ? $pageNum + 1 : $pageNum;//0だったら1
          $pageNum = floor($pageNum / 10);
          $pageNum = $pageNum == 0 ? $pageNum+1 : $pageNum;
          //前後5個ぐらいに制限したい
          $start = 1;
          if($_GET["page"] >= 3){
            $start = $_GET["page"] - 2;
          }
          //$_GET["page"] = 4 ならstartが2、endが6もしくはページ終了までが理想
          $end = $start + 4;
          $lastPageNum = $pageNum > $end ? $end : $pageNum;//$endの値のほうが小さければ、$endを代入

          for($i = $start; $i <= $lastPageNum;$i++){
            if($i == $_GET["page"]){
              echo '<li class = "active disabled"><a>'.$i.'</a></li>';
            }else{
              echo '<li><a href="recruit_list.php?how='.$_GET["how"].'&sort='.$_GET["sort"].'&word='.$_GET["word"].'&page='.$i.'">'.$i.'</a></li>';
            }
          }
          echo '<li class=""><a href="recruit_list.php?how='.$_GET["how"].'&sort='.$_GET["sort"].'&word='.$_GET["word"].'&page='.$pageNum.'">&raquo;</a></li>';
         ?>
      </ul>
    </div>
	</main>
  <footer>
    プロ演3
  </footer>
</body>
</html>
