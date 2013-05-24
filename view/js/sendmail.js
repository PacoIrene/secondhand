$(document).ready(function(){
    //--------------------------------------------------------------------------
    // 控制页面背景大小变化
    //--------------------------------------------------------------------------
   $(window).resize(function() {
  var length=$("#titleAndMail-title-input").width();
  $("#titleAndMail-mail-input").width(length);
  $(".objectInfoFooter").width(length);
}); 
});