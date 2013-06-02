$(document).ready(function(){
	$('.drop5').click(function(){
		$(this).dropdown();
	});
});
function newMsgDiv(color,content){
	var newMsgDiv = $(".templateMsgDiv").clone(true).removeClass("templateMsgDiv");
	newMsgDiv.find("i").css({"color":color});
	newMsgDiv.find("p").text(content);
	newMsgDiv.css({"border": "1px solid "+color,"box-shadow":"1px 1px 3px "+color});
	newMsgDiv.appendTo(".messagesDiv");
	newMsgDiv.slideDown("fast");
	setTimeout(function(){
		$(".messagesDiv .messageDiv:FIRST-CHILD").remove();
	},2000);
}
