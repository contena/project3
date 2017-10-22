function start(){
  var title = $("#title").val();
  var content = $('#content').val();

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
    }
  });
  console.log("すたーと");
}

function checkText(){
  $(".viewError").remove();
  var title = $("#title").val();
  var content = $('#content').val();
  var titleBool = true;
  var contentBool = true;
  // var tagBool = true;
  if(title == ""){
    titleBool = false;
    $(".inputTitle").after('<span class="viewError">空白です</span>');
  }
  if(content == ""){
    contentBool = false;
    $(".inputContent").after('<span class="viewError">空白です</span>');
  }

  if(titleBool && contentBool){
    start();
  }
}

function tagControll(){
  var tag = $(".addTag").val();
  if(tag !== ""){
    console.log(tag);
    $(".tags > li").prepend('<ul class="added"><li class="tag">'+ tag +'</li><button class="deleteButton">削除</button></ul>');
    $(".addTag").val("");
  }
}
