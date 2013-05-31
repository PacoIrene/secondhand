$(document).ready(function(){
    //--------------------------------------------------------------------------
    // 窗口大小改变位置改变
    //--------------------------------------------------------------------------
  $(window).resize(function() {
  var length=$("#titleAndMail-title-input").width();
  $("#titleAndMail-mail-input").width(length);
  $(".objectInfoFooter").width(length);
}); 
});