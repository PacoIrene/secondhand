$(document).ready(function(){
	// 获取分类的值
	// ------------------------------------------------------------------------------
	$(".thingInfoPart-class-li").click(function() {
		$("#writeblog_clssification").val($(this).text());
		$("#selectClass").text("分类：" + $(this).text());
	});
});