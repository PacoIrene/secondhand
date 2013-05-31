$(document).ready(function(){
    //--------------------------------------------------------------------------
    // 点击输入框评论按钮出现
    //--------------------------------------------------------------------------
    $("#thingContent-comment-input").click(function(){
    	$(".thingContent-comment-button").slideDown();
    });
    $("#thingContent-comment-input").blur(function(){
    	$(".thingContent-comment-button").slideUp();
    });
});