<?php
session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}
 ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <!-- <meta http-equiv="X-UA-Compatible" content="ie=edge"> -->
  <title>募集画面</title>
  <link rel="stylesheet" href="css/non-responsive.css">
  <link rel="stylesheet" href="css/recruit_start.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/richtext.min.css">
  <link rel="stylesheet" href="https://opensource.keycdn.com/fontawesome/4.7.0/font-awesome.min.css">

  <script src="./JS/jquery-2.1.3.js"></script>
  <script src="./JS/recruit_start.js"></script>
  <script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
  <script src="./JS/jquery.richtext.min.js"></script>

  <script>
    $(function(){
      $(document).on("click",".deleteButton",function(){
        $(this).parent().empty();
      });
      $(".addTag").keypress(function(e){
        if(e.which == 13) tagControll();
      });
      // $("#content").richText({
      //   italic: false,
      //   underline: false,
      //   fonts: false,
      //   imageUpload: false,
      //   fileUpload: false,
      //   videoEmbed: false,
      //   table: false,
      //   code :false,
      //   ol:false
      //
      //   }
      // );
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
        <li class="list-group-item" id="submitbutton">
          <form action="logout.php" method="post">
            <input type="submit" value="ログアウト" />
          </form>
        </li>
      </ul>
    </nav>
  </header>
  <div class="main">
    <hr>
    <div class="recruit">
        <h2>プロジェクト募集</h2>
      <!-- <form action="recruit_start.php" method="post"> -->
        <div class="form-group title">
          <div class="row">
            <label for="title" class="control-label col-xs-1">タイトル</label>
              <div class="col-xs-3">
                <input type="text" name="title" id="title" placeholder="タイトル" class="form-control input-lg inputTitle">
              </div>
          </div>
        </div>
        <div class="form-group content">
          <div class="row">
            <!-- 内容 -->
            <label for="content" class="control-label col-xs-1">内容</label>
            <div class="col-xs-10">
              <textarea name="content" id="content" placeholder="募集内容の詳細" class="form-control inputContent"></textarea>
            </div>
          </div>
        </div>
        <div class="form-group tagListAdd">
          <div class="row">
            <label for="tagList" class="control-label col-xs-1">技能タグ</label>
              <div class="col-xs-3">
                <ul class="tags">
                  <li>
                    <input type="text" name="tag" id="tag" class="addTag form-control">
                    <button type="button" onclick="tagControll()">追加</button>
                  </li>
                </ul>
              </div>
            </div>
        </div>
        <ul class="button">
          <li><button type="button" class="btn btn-default btn-lg send" onclick="checkText()">募集する</button></li>
          <!-- <li><button class="btn btn-default sbm">前のページに戻る</button></li> -->
        </ul>
    </div>
  </div>
<footer>
  プロ演3
</footer>
</body>
</html>
