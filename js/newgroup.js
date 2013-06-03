$(document).ready(function(){
	// 获取分类的值
	// ------------------------------------------------------------------------------
	$(".groupInfoPart-class-li").click(function() {
            if($(this).text()=="学校/学院"){
                $("#groupInfoPart-title-input-hidden").val(1);
            }
            else if($(this).text()=="书籍"){
                $("#groupInfoPart-title-input-hidden").val(2);
            }
            else if($(this).text()=="电子产品"){
                $("#groupInfoPart-title-input-hidden").val(3);
            }
            else if($(this).text()=="生活用品"){
                $("#groupInfoPart-title-input-hidden").val(4);
            }
            else if($(this).text()=="其他"){
                $("#groupInfoPart-title-input-hidden").val(5);
            }
            else{
                $("#groupInfoPart-title-input-hidden").val(5);
            }
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