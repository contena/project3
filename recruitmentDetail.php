<?php
  session_start();
  include "recruit_list_func.php";
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <title>Document</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css"> -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/non-responsive.css">
<script src="./JS/jquery-2.1.3.js"></script>
<script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<!-- <script src="//code.jquery.com/jquery-2.11.2.min.js"></script> -->

<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/iScroll/5.1.3/iscroll.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/js/drawer.min.js"></script>
</head>
<!-- <body class="drawer drawer--left"> -->
</head>
<body>
  <header>
    <nav>
      <ul class="list-group">
        <li class="list-group-item img-top"><img src="pitalink.gif"  height="50" alt=""></li>
        <li class="list-group-item"><a href="*">プロフィール</a></li>
        <li class="list-group-item"><a href="recruit_start.html">募集する</a></li>
        <li class="list-group-item"><a href="recruit_list.php">検索する</a></li>
        <li class="list-group-item"><a href="talk.php">トークする</a></li>
        <li class="list-group-item">  <form action="logout.php" method="post"><input type="submit" value="ログアウト" /></form></li></ul>
    </nav>
  </header>
	<div id="main">
    <hr>
    <div class="recruiter">
      募集者の情報
    </div>
    <div class="title">
      募集タイトル
    </div>
    <div class="info">
      詳細
    </div>
    <div class="tag">
      タグ一覧
    </div>
    <form action="recruit_join.php" method="post">
      <input type="submit" value="応募する">
    </form>
    <a href="recruit_list.php">募集一覧に戻る</a>
	</div>
  <footer>
    プロ演3
  </footer>
</body>
</html>
