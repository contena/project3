<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}

require "talk_func.php";
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
  <link rel="stylesheet" href="css/talk.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="./JS/jquery-2.1.3.js"></script>
  <script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <title>Document</title>
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
        <li class="list-group-item" id="submitbutton"> <form action="logout.php" method="post"><input type="submit" value="ログアウト" /></form></li>
      </ul>
    </nav>
  </header>
  <div class="main">
    <div class="friendList">
      <div class="friendTop">
        <h2>トーク一覧</h2>
      </div>
      <?php
        $talk_list = getTalkList();//トーク一覧の連想配列が乗った配列が返る
        for($i = 0;$i < count($talk_list);$i++){
            echo '
              <div class="friend">
                  <div class="icon">
                      <img src="./p_icon/'.$talk_list[$i]["p_icon"].'" width="60" height="80">
                  </div>
                  <a href="talk.php?t_id='.$talk_list[$i]["t_id"].'">
                  <div class="info">
                    <div class="name">'.$talk_list[$i]["a_name"].'</div>
                    <div class="content">'.$talk_list[$i]["m_title"].'</div>
                  </div>
                    </a>
              </div>
            ';
        }
       ?>

    </div>
    <div class="talkMenu">
        <div class="talk">
      <?php
      if(isset($_GET["t_id"])){
        $talk_contents = getTalkContent($_GET["t_id"]);
        if($talk_contents === false){
          $talk_contents = null;
        }
        if(isset($talk_contents)){
          foreach ($talk_contents as $r) {
            if($r["t_host_id"] == $_SESSION["a_id"]){
              echo
              '<div class="myTalk">
                <span class="txt">'.$r["t_content"].'</span>
              </div>';
            }else{
              echo '
              <div class="opponentTalk">
                <span class="txt">'.$r["t_content"].'</span>
              </div>
              ';
            }
          }
        }else{

        }
      }

       ?>

    </div>
    <?php
    if(isset($_GET["t_id"])){
      echo '<div class="sendForm">
        <form action="talk_controller.php" method="post">
          <textarea name="content"></textarea>
          <input type="submit" value="送信">
          <input type="hidden" name="t_id" value="'.$_GET["t_id"].'">
        </form>
      </div>';
        }
      ?>
  </div>
  <!-- <footer>
    プロ演3
  </footer> -->
</body>
</html>
