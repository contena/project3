function start(){
  var title = $("#title").val();
  var content = $('#content').val();
  content = content.replace("<","'<'");
  content = content.replace(">","'>'");

  var tags = [];
  $(".tag").each(function(){//タグ
    tags.push($(this).text());
  });
  $.ajax({
    type:"post",
    url: "recruit_starting.php",
    data:{
        'title':title,
        'content':content,
        'tag':tags
      },
    success:function(html){
      console.log("send");
      alert("募集を開始しました");
      location.reload(true);
    }
  });
  console.log("すたーと");
}

function checkText(){
  $(".send").prop("disabled",true);
  $(".viewError").remove();
  var title = $("#title").val();
  var content = $('#content').val();
  var titleBool = true;
  var contentBool = true;
  if(title == ""){
    titleBool = false;
    $(".inputTitle").after('<span class="viewError">空白です</span>');
    $(".send").prop("disabled",false);
  }
  if(content == ""){
    contentBool = false;
    $(".inputContent").after('<span class="viewError">空白です</span>');
    $(".send").prop("disabled",false);
  }
  if(titleBool && contentBool){
    start();
  }

}

function tagControll(){
  $(".viewError").remove();
  var tag = $(".addTag").val();
  tag = tag.replace("<","'<'");
  tag = tag.replace(">","'>'");
  var tagCount = $(".tag").length;
  var countCheck = true;
  if(tagCount > 2){
    $(".addTag").after('<span class="viewError">登録できるタグは3つまでです</span>');
    countCheck = false;
  }


  if(tag !== "" && countCheck){
    console.log(tag);
    $(".tags > li").prepend('<ul class="added"><li class="tag">'+ tag +'</li><button class="deleteButton">削除</button></ul>');
    $(".addTag").val("");
    $(".addTag").focus();
  }
}
