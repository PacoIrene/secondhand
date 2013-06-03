$(document).ready(function(){
	// 获取分类的值
	// ------------------------------------------------------------------------------
	$(".thingInfoPart-class-li").click(function() {
		 if($(this).text()=="书籍"){
                $("#thingInfoPart-title-input-hidden").val(1);
            }
            else if($(this).text()=="电子产品"){
                $("#thingInfoPart-title-input-hidden").val(2);
            }
            else if($(this).text()=="生活用品"){
                $("#thingInfoPart-title-input-hidden").val(3);
            }
            else if($(this).text()=="其他"){
                $("#thingInfoPart-title-input-hidden").val(4);
            }
            else{
                $("#thingInfoPart-title-input-hidden").val(4);
            }
//            alert($("#thingInfoPart-title-input-hidden").val());
		$("#selectClass").text("分类：" + $(this).text());
	});
});