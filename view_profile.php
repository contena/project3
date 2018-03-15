<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}
if($_GET["a_id"] == null || !ctype_digit($_GET["a_id"])){
  header("Location:recruit_list.php");
}

include "recruit_list_func.php";
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charet="utf-8">
<link rel="stylesheet" href = "./css/other_profile.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/common.css">
<title>profile</title>
</head>
<script src="./JS/jquery-2.1.3.js"></script>
<script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <!-- <script src ="js/bootstrap.min.js"></script> -->
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
  <?php
    $prof = getIcon($_GET["a_id"]);
    echo '
    <ul>
      <li id = "icon_li">
        <div id = "icon">
          <img src="./p_icon/'.$prof["p_icon"].'"  id = "p_icon">
        </div>

      </li>
      <li id = "profile_li">
          <div id = "profile">
            <div id = "nickname">
              <label>ユーザー名:</label>
              <label>'.$prof["p_nickname"].'</label>
            </div>
          </div>

          <div id = "age">
            <div id = "">
              <label>年齢:</label>
              <label>'.$prof["age"].'</label>
            </div>
          </div>

          <div id = "address">
            <label>居住地:</label>
            <label>'.$prof["p_address"].'</label>
          </div>

          <div id = "skill_id">
            <label>プログラム言語:</label>
            <label>'.$prof["p_skill"].'</label>
          </div>

          <div id = "selfproduce">
            <label>自己紹介:</label>
            <text>'.$prof["p_selfproduce"].'</text>
          </div>

          <div id = "line_id">
            <label>lineID:</label>
            <label>'.$prof["line"].'</label>
          </div>
      </li>
    </ul>
    ';
   ?>
  </body>
</html>
