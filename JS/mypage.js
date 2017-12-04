$(function(){
  $(document).on("click",".mComp",function(){
    var m_id = $(this).parent().parent().find("input:hidden").val();
    // console.log(m_id);
    console.log("haa");
    $.ajax({
      type : 'post',
      url : "matching_comp.php",
      data :{ 'm_id' : m_id },
      success:function(html){
        alert(html);
        location.reload(true);
      }
    });
  });

});
