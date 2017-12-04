<?php
  session_start();
if($_SESSION["a_id"] == null){
  header("Location:title.html");
}

  include "mypage_func.php";
 ?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
  <title>Document</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css"> -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/common.css"> -->
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/non-responsive.css">

  <link rel="stylesheet" href = "./css/my_profile.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/common.css">


<script src="./JS/jquery-2.1.3.js"></script>
<script src="./JS/mypage.js"></script>
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
        <li class="list-group-item"><a href="recruit_start.php">募集する</a></li>
        <li class="list-group-item"><a href="recruit_list.php">検索する</a></li>
        <li class="list-group-item"><a href="talk.php">トークする</a></li>
        <li class="list-group-item" id="submitbutton"> <form action="logout.php" method="post"><input type="submit" value="ログアウト" /></form></li></ul>
    </nav>
  </header>
	<main role="main">
    <hr>
    <div class="navArea">
      <ul class="nav nav-tags nav-stacked">
        <li class="active nav-item"><a href="#pro-tab" data-toggle="tab">プロフィール</a></li>
        <li class="nav-item"><a href="#rec-tab" data-toggle="tab">募集中一覧</a></li>
        <li class="nav-item"><a href="#join-tab" data-toggle="tab">加入中一覧</a></li>
        <li class="nav-item"><a href="#complete-tab" data-toggle="tab">完了一覧</a></li>
        <li class="nav-item"><a href="#block-tab" data-toggle="tab">ブロックリスト</a></li>
      </ul>
      <div class="tab-content">
        <div id="pro-tab" class="tab-pane active">
          <script>
          $(function(){
            $("#kan").hide();
          });
          function hensyuu(){

            var tosi =  $("#tosi").text();
            var basyo =  $("#basyo").text();
            var tokui =  $("#tokui").text();
            var gengo =  $("#gengo").text();
            var zikosyoukai =  $("#zikosyoukai").text();
            var line =  $("#line").text();

            $("#kan").show();
            tosi = $("#tosi").html('<textarea id = "new_tosi">'+tosi+"</textarea>");
            basyo = $("#basyo").html('<textarea id = "new_basyo">'+basyo+"</textarea>");
            tokui = $("#tokui").html('<textarea id = "new_tokui">'+tokui+"</textarea>");
            gengo = $("#gengo").html('<textarea id = "new_gengo">'+gengo+"</textarea>");
            zikosyoukai = $("#zikosyoukai").html('<textarea id = "new_zikosyoukai">'+zikosyoukai+"</textarea>");
            line = $("#line").html('<textarea id = "new_line">'+line+"</textarea>");

          }
          function kanryou(){
            var new_tosi = $("#new_tosi").val();
            var new_basyo = $("#new_basyo").val();
            var new_tokui = $("#new_tokui").val();
            var new_gengo = $("#new_gengo").val();
            var new_zikosyoukai = $("#new_zikosyoukai").val();
            var new_line = $("#new_line").val();

            if (document.getElementById('new_tosi').value == ""
            || document.getElementById('new_tokui').value == ""
            || document.getElementById('new_gengo').value == ""
            || document.getElementById('new_zikosyoukai').value == ""){
                alert('空文字です');
            }else if(!$('#new_tosi').val().match(/^\d+$/)){
              alert('数字のみです');
            }else {
              new_tosi = $("#tosi").html('<text id = "tosi">'+new_tosi+'</text>');
              new_basyo = $("#basyo").html('<text id = "basyo">'+new_basyo+'</text>');
              new_tokui = $("#tokui").html('<text id = "tokui">'+new_tokui+'</text>');
              new_gengo = $("#gengo").html('<text id = "gengo">'+new_gengo+'</text>');
              new_zikosyoukai = $("#zikosyoukai").html('<text id = "zikosyoukai">'+new_zikosyoukai+'</text>');
              new_line = $("#line").html('<text id = "line">'+new_line+'</text>');

              $("#kan").hide();

            }
          }
          </script>
          <?php
          $data = getProf();
            foreach ($data as $r) {
              echo '<ul>
                <li id = "icon_li">
                  <div id = "icon">
                    <img src="./p_icon/'.$r["p_icon"].'"  id = "p_icon">
                  </div>
                </li>
                <li id = "profile_li">

                    <div id = "profile">
                      <div id = "nickname">
                        <label>ユーザー名:</label>
                        <text>'.$r["p_nickname"].'</text>
                      </div>
                    </div>

                    <div id = "age">
                      <div id = "">
                        <label>年齢:</label>
                        <text id = "tosi">'.$r["age"].'</text>
                      </div>
                    </div>

                    <div id = "address">
                      <label>居住地:</label>
                      <text id = "basyo">'.$r["p_address"].'</text>
                    </div>

                    <div id = "skill">
                      <label>得意なプログラム:</label>
                      <text id = "tokui">'.$r["p_skill"].'</text>
                    </div>

                    <div id = "skill_id">
                      <label>プログラム言語(未定):</label>
                      <text id = "gengo">HTML,C言語</text>
                      </div>

                    <div id = "selfproduce">
                      <label>自己紹介:</label>
                      <text id = "zikosyoukai">'.$r["p_selfproduce"].'</text>
                    </div>

                    <div id = "line_id">
                      <label>lineID:</label>
                      <text id = "line">rekirito</text>
                    </div>
                    <br>

                    <button type="submit" class = "btn btn-success btn-lg" onclick="hensyuu();">プロフィール編集ボタン</button>
                    <button type="submit" class = "btn btn-danger btn-lg">ブロック一覧表示</button>
                    <button type="submit" class = "btn btn-success btn-lg" onclick="kanryou();" id ="kan" >完了</button>
                </li>
              </ul>';
            }
           ?>
          <!-- <ul>
            <li id = "icon_li">
              <div id = "icon">
                <img src="../霊夢　表裏縦長.jpg"  id = "p_icon">
              </div>
            </li>
            <li id = "profile_li">

                <div id = "profile">
                  <div id = "nickname">
                    <label>ユーザー名:</label>
                    <text>aaaa</text>
                  </div>
                </div>

                <div id = "age">
                  <div id = "">
                    <label>年齢:</label>
                    <text id = "tosi">30</text>
                  </div>
                </div>

                <div id = "address">
                  <label>居住地:</label>
                  <text id = "basyo">京都</text>
                </div>

                <div id = "skill">
                  <label>得意なプログラム:</label>
                  <text id = "tokui">HTML</text>
                </div>

                <div id = "skill_id">
                  <label>プログラム言語(未定):</label>
                  <text id = "gengo">HTML,C言語</text>
                  </div>

                <div id = "selfproduce">
                  <label>自己紹介:</label>
                  <text id = "zikosyoukai">ああああああaaaaaaaaaaaaaaaaaaaaaaaaaaaa</text>
                </div>

                <div id = "line_id">
                  <label>lineID:</label>
                  <text id = "line">rekirito</text>
                </div>
                <br>

                <button type="submit" class = "btn btn-success btn-lg" onclick="hensyuu();">プロフィール編集ボタン</button>
                <button type="submit" class = "btn btn-danger btn-lg">ブロック一覧表示</button>
                <button type="submit" class = "btn btn-success btn-lg" onclick="kanryou();" id ="kan" >完了</button>
            </li>
          </ul> -->
        </div>
        <div id="rec-tab" class="tab-pane">
          <div class="container">
             <div class=”table-responsive”>
               <h1>募集中のプロジェクト</h1>
             <table class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th>プロジェクト名</th>
                   <th></th>
                 </tr>
               </thead>
               <tbody>
                 <!-- <tr> -->
                   <?php
                      $rec_data = getRecruiting();
                      foreach ($rec_data as $r) {
                        echo '
                          <tr>
                            <td width="300">'.$r["m_title"].'</td>
                            <td width="200"><button type="button" class="btn button btn-primary mComp">募集終了</button></td>
                            <input type="hidden" name="m_id" value='.$r["m_id"].'>
                          </tr>
                        ';
                      }
                    ?>
                 <!-- </tr> -->
               </tbody>
             </table>
            </div>
           </div>
          </div>
          <div id="join-tab" class="tab-pane">
            <div class="container">
               <div class=”table-responsive”>
                 <h1>加入中のプロジェクト</h1>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>プロジェクト名</th>
                     <th>名前</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                      $joinedMatching = getApplying();
                      foreach ($joinedMatching as $j) {
                        echo '
                        <tr>
                          <td width="300">'.$j["m_title"].'</td>
                          <td width="500">煌木 太郎</td>
                        </tr>
                        ';
                      }
                    ?>
                 </tbody>
               </table>
              </div>
             </div>
            </div>
          <div id="complete-tab" class="tab-pane">
            <div class="container">
               <div class=”table-responsive”>
                 <h1>完了したプロジェクト</h1>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>プロジェクト名</th>
                     <th>名前</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                      $completeMatching = getCompleteMatch();
                      foreach ($completeMatching as $c) {
                        echo '
                        <tr>
                          <td width="300">'.$c["m_title"].'</td>
                          <td width="500">煌木 太郎</td>
                        </tr>
                        ';
                      }
                    ?>
                 </tbody>
               </table>
              </div>
             </div>
            </div>
          <div id="block-tab" class="tab-pane">
            <div class="container">
             <div class=”table-responsive”>
               <h1>ブロックリスト</h1>
             <table class="table table-striped table-bordered">
               <thead>
                 <tr>
                   <th></th>
                   <th>名前</th>
                   <th>ブロック解除</th>
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <td width="300"><img src="./user_icon_default.jpg" height="95"></td>
                   <td width="500">煌木 太郎</td>
                   <td width="200"><button type="button" class="btn button btn-primary">ブロック解除</button></td>
                 </tr>
               </tbody>
             </table>
            </div>
           </div>
          </div>
        </div>
      </div>
	</div>
</main>
  <footer>
    プロ演3
  </footer>
</body>
</html>
