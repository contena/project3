<?php
session_start();
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
        <li class="list-group-item img-top"><img src="pitalink.png"  height="50" alt=""></li>
        <li class="list-group-item"><a href="*">プロフィール</a></li>
        <li class="list-group-item"><a href="*">募集する</a></li>
        <li class="list-group-item"><a href="*">検索する</a></li>
        <li class="list-group-item"><a href="talk.php">トークする</a></li>
        <li class="list-group-item">  <form action="logout.php" method="post"><input type="submit" value="ログアウト" /></form></li></ul>
      </ul>
    </nav>
  </header>
  <div class="main">
    <div class="friendList">
      <div class="friendTop">
        <h2>トーク一覧</h2>
      </div>
      <?php
        $talk_list = getTalkList();
       ?>
      <div class="friend">
          <div class="icon">
              <img src="Ci44F-OUUAEAt1Q.jpg" width="60" height="80">
          </div>
          <div class="info">
            <div class="name">てすと</div>
            <div class="content">おはよう</div>
          </div>
      </div>
      <!-- <div class="friend">
          <div class="icon">
              <img src="Ci44F-OUUAEAt1Q.jpg" width="60" height="80">
          </div>
          <div class="info">
            <div class="name">てすと</div>
            <div class="content">おはよう</div>
          </div>
      </div>
      <div class="friend">
          <div class="icon">
              <img src="Ci44F-OUUAEAt1Q.jpg" width="60" height="80">
          </div>
          <div class="info">
            <div class="name">てすと</div>
            <div class="content">おはよう</div>
          </div>
      </div> -->
    </div>
    <div class="talkMenu">
      <h2>***のトーク</h2>
      <div class="talk">
        <div class="myTalk">
          aaa
        </div>
        <div class="opponentTalk">
          bbb
        </div>
      </div>
      <div class="sendForm">
        <form action="*" method="*">
          <input type="text" name="talk">
          <input type="submit" value="送信">
        </form>
      </div>
    </div>
  </div>
  <!-- <footer>
    プロ演3
  </footer> -->
</body>
</html>
