<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <title>Document</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css"> -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/common.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/non-responsive.css">
<script src="./JS/jquery-2.1.3.js"></script>
<script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script>
$('.tooltip-tool').tooltip({
            selector: "a[data-toggle=tooltip]"
        });
$("a[data-toggle=popover]").popover();
</script>
  <!-- <script src="https://cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script> -->

</head>
<body>
  <header>
    <nav>
      <ul class="list-group">
        <li class="list-group-item img-top"><img src="pitalink.gif"  height="50" alt=""></li>
        <li class="list-group-item"><a href="*">プロフィール</a></li>
        <li class="list-group-item"><a href="*">募集する</a></li>
        <li class="list-group-item"><a href="*">検索する</a></li>
      </ul>
    </nav>
  </header>
	<main role="main">
    <hr>
    <div class="navArea">
      <ul class="nav nav-tags nav-stacked">
        <li class="active nav-item"><a href="#pro-tab" data-toggle="tab">プロフィール</a></li>
        <li class="nav-item"><a href="#rec-tab" data-toggle="tab">募集中一覧？</a></li>
        <li class="nav-item"><a href="#join-tab" data-toggle="tab">加入中一覧？</a></li>
      </ul>
      <div class="tab-content">
        <div id="pro-tab" class="tab-pane active">
          うんち
        </div>
        <div id="rec-tab" class="tab-pane">
          unnk
        </div>
        <div id="join-tab" class="tab-pane">
          うんこ
        </div>
      </div>
	</div>
</main>
  <footer>
    プロ演3
  </footer>
</body>
</html>
