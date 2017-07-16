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
  <link rel="stylesheet" href="css/recruit_list.css">
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
	<main role="main">
    <hr>
    <div id="search" class="form-group">
      <form action="*" method="*" class="form-inline">
          <select class="form-control" name="how" id="how">
            <option value="タグ">タグ</option>
            <option value="名前">名前</option>
          </select>
          <select class="form-control" name="sort" id="sort">
            <option value="応募数">応募数</option>
          <option value="日付">日付</option>
          </select>
          <input class="form-control" type="text" name="word" value="a">
          <input class="btn btn-default" type="submit" value="検索">
      </form>
    </div>
    <div class="list-group">
      <?php
        $recruit_list = recruitListGet();
        foreach ($recruit_list as $r) {
          echo '
            <form action="recruit_join.php" method="post">
              <div class="list-group-item list">
                <div class="list-icon">
                  <img src="user_icon_default.jpg" width="100" height="150">
                </div>
                <div class="list-content">
                  <span class="title">
                  '.$r["m_title"].'
                  </span>
                  <div class="content">
                  '.$r["m_content"].'
                  </div>
                  <span class="tag"><img src="tag.png">HTML</span>
                  <span class="count">'.$r["m_count"].'</span>
                  <div class="send">
                    <button type="submit" name="button">応募する</button>
                  </div>
                  <input type="hidden" name="m_id" value="'.$r["m_id"].'">
                </div>
              </div>
            </form>
          ';
        }
       ?>

      <!-- <div class="list-group-item list">
        <div class="list-icon">
          <img src="user_icon_default.jpg" width="100" height="150">
        </div>
        <div class="list-content">
          <span class="title">
            ここにタイトルを入力してください
          </span>
          <div class="content">
              ここに内容を入力してください
          </div>
          <span class="tag"><img src="tag.png">HTML</span>
          <span class="count">応募人数：二人</span>
          <div class="send">
            <button type="submit" name="button">応募する</button>
          </div>
        </div>
      </div> -->

    </div>
    <div class="move page">
      <ul class="pagination page">
        <li class="disabled"><a href="">&laquo;</a></li>
        <li class="active"><a href="*">1</a></li>
        <li><a href="*">2</a></li>
        <li><a href="*">3</a></li>
        <li><a href="*">4</a></li>
        <li><a href="*">5</a></li>
      </ul>
    </div>
	</main>
  <footer>
    プロ演3
  </footer>
</body>
</html>
