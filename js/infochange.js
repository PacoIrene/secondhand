/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#userNameInputR").blur(function(){
    	if($(this).val() == null || $(this).val() == ""){
    		$(".userNameControl").removeClass("success");
    		//$(".userNameControl").removeClass("warning");
			$(".userNameControl").addClass("error");
    		$(".userNameAlert").removeClass("alert-warning");
    		newMsgDiv("#dd6a45","昵称怎么能为空呢！.");
    	}else{
    		$(".userNameControl").removeClass("error");
    		//$(".userNameControl").removeClass("warning");
			$(".userNameControl").addClass("success");
    		
    	}
    });
     $("#passwordInputR").blur(function(){
    	if($(this).val() == null || $(this).val() == ""){
    		$(".passwordRControl").removeClass("success");
    		$(".passwordRControl").removeClass("warning");
			$(".passwordRControl").addClass("error");
    		$(".passwordRAlert").removeClass("alert-warning");
    		$(".passwordRAlert").addClass("alert-error");
    		newMsgDiv("#dd6a45","亲，密码必须得填呢.");
    		$(".passwordRAlert").slideDown();
    	}else if(!CheckPwdIntension($(this).val())){
    		$(".passwordRControl").removeClass("success");
    		$(".passwordRControl").removeClass("error");
			$(".passwordRControl").addClass("warning");
    		$(".passwordRAlert").removeClass("alert-error");
    		$(".passwordRAlert").addClass("alert-warning");
    		newMsgDiv("#c09853","密码有点弱，小心被盗哦.");
    		$(".passwordRAlert").slideDown();
    	}else{
    		$(".passwordRControl").removeClass("warning");
    		$(".passwordRControl").removeClass("error");
			$(".passwordRControl").addClass("success");
    		$(".passwordRAlert").slideUp();
    	}
    });
    
    $("#passwordInputR2").blur(function(){
    	if($(this).val() != $("#passwordInputR").val()){
    		$(".passwordR2Control").removeClass("success");
    		//$(".passwordR2Control").removeClass("warning");
			$(".passwordR2Control").addClass("error");
    		$(".passwordR2Alert").removeClass("alert-warning");
    		$(".passwordR2Alert").addClass("alert-error");
    		newMsgDiv("#c09853","额，两次密码输得不同呢.");
    		$(".passwordR2Alert").slideDown();
    	}else if($(this).val() == null || $(this).val() == ""){
    		$(".passwordR2Control").removeClass("success");
    		//$(".passwordR2Control").removeClass("warning");
			$(".passwordR2Control").addClass("error");
    		$(".passwordR2Alert").removeClass("alert-warning");
    		$(".passwordR2Alert").addClass("alert-error");
    		newMsgDiv("#dd6a45","密码得输两次才不会错哦.");
    		$(".passwordR2Alert").slideDown();
    	}else{
    		$(".passwordR2Control").removeClass("error");
			$(".passwordR2Control").addClass("success");
    		$(".passwordR2Alert").slideUp();
    	}
    });
    function CheckPwdIntension(s)
{
	if(s == null || s.trim() == "")
		return false;
		
	var pattern = /^[0-9]{1,8}$/;
	if(pattern.exec(s))
		return false;
	else
		return true;
}
$("#uploadPic").click(function(){
    $("#file4").click();
    var filename=$("#file4").attr("name");
});
});

