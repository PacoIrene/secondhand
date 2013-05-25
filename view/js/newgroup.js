$(document).ready(function(){
	// 获取分类的值
	// ------------------------------------------------------------------------------
	$(".groupInfoPart-class-li").click(function() {
		$("#writeblog_clssification").val($(this).text());
		$("#selectClass").text("分类：" + $(this).text());
	});
	//--------------------------------------------------------------------------
    // 窗口大小改变位置改变
    //--------------------------------------------------------------------------
  	$(window).resize(function() {
  		var length=$("#groupInfoPart-title-input").width();
 		$("#groupInfoPart-description-input").width(length);
 		$(".groupInfoPart-submitButton").width(length);
 	});
});