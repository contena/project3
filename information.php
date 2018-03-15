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
  <title>詳細</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/information.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/non-responsive.css">
  <script src="./JS/jquery-2.1.3.js"></script>
  <script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <script>
  $(function(){
    $(document).on("click",".joinButton",function(){
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
  <div class="info-group">
  <hr>
  <?php
      $data = recGet();
      echo '
  <dl class="info-list">
    <dt class="title">
      <h2>タイトル</h2>
    </dt>
      <dd>
        '.$data["m_title"].'
      </dd>
    <dt class="Contributor">
      <h2>投稿者</h2>
    </dt>
    <dd>
      <a href="view_profile.php?a_id='.$data["a_host_id"].'">
        '.$data["p_nickname"].'
      </a>
    </dd>
    <dt class="content">
      <h2>information</h2>
    </dt>
      <dd>
        '.$data["m_content"].'
      </dd>
    <dt class="tag">
      <span><h2>tag</h2></span>
    </dt>
      <dd>';
      $tag = getTag($data['m_id']);
      foreach ($tag as $t) {
        echo '<a href="recruit_list.php?how=tag&sort=count&word='.$t["skill"].'"><img src="tag.png">'.$t["skill"].'</a>';
      }
      echo '</dd>

    <dt class="Participation">
      <h3>参加者数</h3>
    </dt>
      <dd>
        現在の人数:'.$data["m_count"].'人
      </dd>

    <dt class="join">
      <button class="joinButton">参加する</button>
      <input type="hidden" class="m_id" name="m_id" value="'.$data["m_id"].'">
    </dt>';
    ?>
    <dd>
    </dd>
  </ul>

</div>
</main>
  <footer>
    プロ演3
  </footer>
  </body>
</html>
