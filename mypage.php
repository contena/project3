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
  <title>マイページ</title>
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/drawer/3.1.0/css/drawer.min.css"> -->
  <!-- <link rel="stylesheet" href="css/bootstrap.min.css"> -->

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/profile.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="css/non-responsive.css">

  <link rel="stylesheet" href = "./css/my_profile.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/common.css">
  <link rel="stylesheet" href="./css/myproject.css">


<script src="./JS/jquery-2.1.3.js"></script>
<script src="./JS/modal.js"></script>
<script src="./JS/mypage.js"></script>
<script src="./JS/bootstrap-3.3.7-dist/js/bootstrap.js"></script>
<script>
$('.tooltip-tool').tooltip({
            selector: "a[data-toggle=tooltip]"
        });
$("a[data-toggle=popover]").popover();

var Decision = ("false");
  $(function () {
    $("#Detail").hide();
    $("input").click(function(){
      var id = $(this).attr("id");
      if(id == "button1"){
        if(Decision == "false"){
          $('#Evaluation').css('height','auto');
          Decision = ("true");
        }else {
          $('#Evaluation').css('height','40px');
          Decision = ("false");
        }
      }
      if(id == "button2"){
        $("#Detail").slideToggle();
      }
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
  <!--
    評価画面用のウィンドウ
    bodyの下に書かないと表示位置が下の方になってしまう
  -->
  <div id="modal" class="modal-content">
    <h2>このマッチングの評価</h2>
    <form method="post" action="review.php">
      <div class="rating">
        評価：
        <span class="star-rating">
          <input type="radio" name="rating" value="1"><i></i>
          <input type="radio" name="rating" value="2"><i></i>
          <input type="radio" name="rating" value="3"><i></i>
          <input type="radio" name="rating" value="4"><i></i>
          <input type="radio" name="rating" value="5"><i></i>
        </span>
      </div>
      <br>
      <div class="comment">
        コメント：<input type="text" name="comment">
      </div>
      <input type="hidden" class="modal_m_comp_id" name="modal_m_comp_id" value="">
      <input type="submit" value="送信">
    </form>
  </div>
  <!--
    ウィンドウはここまで
  -->
	<main role="main">
    <hr>
    <div class="navArea">
      <ul class="nav nav-tags nav-stacked">
        <li class="active nav-item"><a href="#pro-tab" data-toggle="tab">プロフィール</a></li>
        <li class="nav-item"><a href="#rec-tab" data-toggle="tab">募集中一覧</a></li>
        <li class="nav-item"><a href="#join-tab" data-toggle="tab">加入中一覧</a></li>
        <li class="nav-item"><a href="#complete-tab" data-toggle="tab">完了一覧</a></li>
        <li class="nav-item"><a href="#review-tab" data-toggle="tab">参加プロジェクトの評価確認</a></li>
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
            var gengo =  $("#gengo").text();
            var zikosyoukai =  $("#zikosyoukai").text();
            var line =  $("#line").text();

            $("#kan").show();
            tosi = $("#tosi").html('<textarea id = "new_tosi">'+tosi+"</textarea>");
            basyo = $("#basyo").html('<textarea id = "new_basyo">'+basyo+"</textarea>");
            gengo = $("#gengo").html('<textarea id = "new_gengo">'+gengo+"</textarea>");
            zikosyoukai = $("#zikosyoukai").html('<textarea id = "new_zikosyoukai">'+zikosyoukai+"</textarea>");
            line = $("#line").html('<textarea id = "new_line">'+line+"</textarea>");

          }
          function kanryou(){
            var new_tosi = $("#new_tosi").val();
            var new_basyo = $("#new_basyo").val();
            new_basyo = new_basyo.replace("<","*");
            new_basyo = new_basyo.replace(">","*");
            var new_gengo = $("#new_gengo").val();
            new_gengo = new_gengo.replace("<","*");
            new_gengo = new_gengo.replace(">","*");
            var new_zikosyoukai = $("#new_zikosyoukai").val();
            new_zikosyoukai = new_zikosyoukai.replace("<","*");
            new_zikosyoukai = new_zikosyoukai.replace(">","*");
            var new_line = $("#new_line").val();
            new_line = new_line.replace("<","*");
            new_line = new_line.replace(">","*");
            console.log("wadada");

            if ($("#new_tosi").val() == ""
            || $("#new_gengo").val() == ""
            || document.getElementById('new_zikosyoukai').value == ""){
                alert('空文字です');
            }else if(!$('#new_tosi').val().match(/^\d+$/)){
              alert('数字のみです');
            }else{
              console.log(new_line);
              $.ajax({
                type : 'post',
                url : "profile_update.php",
                data :{ 'selfproduce': new_zikosyoukai,
                        'address' : new_basyo,
                        'skill' : new_gengo,
                        'age' : new_tosi,
                        'line' : new_line
              },
                success:function(html){
                  // alert(html);
                  location.reload(true);
                }
              });

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
                  <form  method="post" enctype="multipart/form-data" action ="icon_update.php">
                   <input type="file" name="image">
                   <input type="submit" name="" value="画像変更">
                  </form>
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

                    <div id = "skill_id">
                      <label>プログラム言語:</label>
                      <text id = "gengo">'.$r["p_skill"].'</text>
                      </div>

                    <div id = "selfproduce">
                      <label>自己紹介:</label>
                      <text id = "zikosyoukai">'.$r["p_selfproduce"].'</text>
                    </div>

                    <div id = "line_id">
                      <label>lineID:</label>
                      <text id = "line">'.$r["line"].'</text>
                    </div>
                    <br>

                    <button type="submit" class = "btn btn-success btn-lg" onclick="hensyuu();">プロフィール編集ボタン</button>
                    <button type="submit" class = "btn btn-success btn-lg" onclick="kanryou();" id ="kan" >完了</button>
                </li>
              </ul>';
            }
           ?>

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
                     <th>募集者名</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                      $joinedMatching = getApplying();
                      foreach ($joinedMatching as $j) {
                        echo '
                        <tr>
                          <td width="300">'.$j["m_title"].'</td>
                          <td width="500">'.$j["p_nickname"].'</td>
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
                     <th>募集者名</th>
                     <th>評価（自分が募集したものを除く）</th>
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                      $completeMatching = getCompleteMatch();
                      foreach ($completeMatching as $c) {
                        echo '
                        <tr>
                          <td width="300"><a href="view_review.php?m_id='.$c["m_complete_id"].'">'.$c["m_title"].'</a></td>
                          <td width="500">'.$c["p_nickname"].'</td>
                          ';
                          if($c["m_complete_id"] != null){
                            $check = checkReview($c["m_complete_id"]);
                            // echo var_dump($check);
                            if($check == null){
                              echo '<td><a data-target="modal" class="modal-open">評価</a></td>
                                    <input type="hidden" class="m_comp_id" name="m_comp_id" value="'.$c["m_complete_id"].'">';
                            }else{
                              echo '<td><a data-target="modal" class="modal-open">評価を編集</a></td>
                                    <input type="hidden" class="m_comp_id" name="m_comp_id" value="'.$c["m_complete_id"].'">';
                                }
                          }
                          echo '</tr>';
                      }

                  ?>
                 </tbody>
               </table>
              </div>

             </div>
            </div>
          <div id="review-tab" class="tab-pane">
              <div class="container">
               <div class=”table-responsive”>
                 <h1>過去に募集したマッチング一覧</h1>
               <table class="table table-striped table-bordered">
                 <thead>
                   <tr>
                     <th>プロジェクト名</th>
                     <!-- <th>ブロック解除</th> -->
                   </tr>
                 </thead>
                 <tbody>
                   <?php
                    $comp = getMyCompleteRec();
                    foreach ($comp as $c) {
                      echo '
                      <tr>
                        <td><a href="view_review.php?m_id='.$c["m_complete_id"].'">'.$c["m_title"].'</a></td>
                      </tr>
                      ';
                      }
                    ?>
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
