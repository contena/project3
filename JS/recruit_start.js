function start(){
  var title = $("#title").val();
  var content = $('#content').val();
  console.log(content);
  var tags = [];
  $(".tag").each(function(){//タグ
    tags.push($(this).text());
    console.log($(this).text());
  });
  $.ajax({
    type:"post",
    url: "recruit_start.php",
    data:{
        'title':title,
        'content':content,
        'tag':tags
      },
    success:function(html){
      console.log("send");
      // $("footer").append(html);
    }
  });
  // $.post("recruit_start.php",{
  //     'title':title,'content':content,'tag':tags
  // },function(data) {
  //   console.log("send");
  // });
}

function tagControll(){
  var tag = $(".addTag").val();
  console.log(tag);
  $(".tags > li").prepend('<ul class="added"><li class="tag">'+ tag +'</li><button class="deleteButton">削除</button></ul>');
}
