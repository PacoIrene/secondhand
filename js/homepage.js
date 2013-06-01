


$(document).ready(function(){
	

	
    //--------------------------------------------------------------------------
    // Page loading animation
    //--------------------------------------------------------------------------
    $(".bodyBackground").fadeIn();
    if($("#isLogin").val() == "Y"){
    	$("#headNav").slideDown();
	    $("#searchDiv").animate({"right":"15%"},"slow");
    }else{
    	setTimeout(function(){
            $("#loginDiv").animate({"right":"0"},"slow");
        }, 300);
    }
    
    
    //--------------------------------------------------------------------------
    // Shift to register module animation
    //--------------------------------------------------------------------------
    $(".goRegist").click(function(){
        $("#loginDiv").animate({"right":"-80%"},"slow");
        setTimeout(function(){
            $("#registDiv").animate({"right":"0"},"1000");
        }, 500);
        document.getElementById("entrance").tabIndex="-1";
        document.getElementById("password").tabIndex="-1";
        document.getElementById("submitLogin").tabIndex="-1";
        document.getElementById("remember").tabIndex="-1";
        document.getElementById("forget").tabIndex="-1";
        document.getElementById("userIdInputR").tabIndex="1";
        document.getElementById("userNameInputR").tabIndex="2";
        document.getElementById("passwordInputR").tabIndex="3";
        document.getElementById("passwordInputR2").tabIndex="4";
        document.getElementById("emailInputR").tabIndex="5";
        document.getElementById("loginbutton").tabIndex="6";
    });

    //--------------------------------------------------------------------------
    // Shift to login module animation
    //--------------------------------------------------------------------------
    $(".goLogin").click(function(){
        $("#registDiv").animate({"right":"-80%"},"slow");
        setTimeout(function(){
            $("#loginDiv").animate({"right":"0"},"slow");
        }, 500);
        $("*").tabIndex="-1"
        document.getElementById("entrance").tabIndex="1";
        document.getElementById("password").tabIndex="2";
        document.getElementById("submitLogin").tabIndex="3";
        document.getElementById("remember").tabIndex="4";
        document.getElementById("forget").tabIndex="5";
    });

    //--------------------------------------------------------------------------
    // Login module
    //--------------------------------------------------------------------------
//    $("#submitLogin").click(function(){
//
//		$("#entrance").blur();
//		$("#password").blur();
//		
//    	if($(".entranceControl").attr("class").indexOf("success") < 0
//    			|| $(".passwordControl").attr("class").indexOf("success") < 0 ){
//    		newMsgDiv("#dd6a45","亲，登录信息没填全哦。");
//    	}else {
//    		$("#submitLogin").button('loading');
//    		$.ajax({
//	    		type:"POST",
//	    		url:"login.do",
//	    		dataType:"text",
//	    		data:"entrance="+$("#entrance").val()+"&password="+$("#password").val(),
//	    		success:function(data)
//	    		{
//	    			if(data == "success")
//	    			{
//	    				$("#headNav").slideDown();
//	        		    $("#loginDiv").animate({"right":"-50%"},"slow");
//	        		    $("#searchDiv").animate({"right":"15%"},"slow");
//	        		    newMsgDiv("#61c4b8","登录成功，欢迎来到爱享^——^");
//	    			}
//	    			else{
//	    				$("#submitLogin").button('reset');
//	    				newMsgDiv("#dd6a45","登录失败>///<用户名、密码可能填错了哦");
//	    			}
//	    		},
//	    		error:function()
//	    		{
//	    			$("#submitLogin").button('reset');
//	    			newMsgDiv("#dd6a45","登录失败>///<网络出问题了呢。");
//	    		}
//	    		
//	    	});
//    	}
//    	
//  
//      return false;
//    });
    
    //-----------------------------------------------------------------------
    //	login form validation
    //-----------------------------------------------------------------------
    $("#entrance").blur(function(){
    	var entrance = $("#entrance").val();
    	if(entrance == null || entrance.trim() == "")
    	{
    		$(".entranceControl").addClass("error");
    		$(".entranceAlert span").text("邮箱怎么是空的呢.");
    		$(".entranceAlert").slideDown();
    	}else if(!CheckIdFormat(entrance) && !CheckEmailFormat(entrance)){
    		$(".entranceControl").addClass("error");
    		$(".entranceAlert span").text("亲，看看邮箱输对了没.");
    		$(".entranceAlert").slideDown();
    	}else{
    		$(".entranceControl").removeClass("error");
    		$(".entranceControl").addClass("success");
    		$(".entranceAlert").slideUp();
    	}
    });
    
    $("#password").blur(function(){
    	var pwd = $(this).val();
    	if(pwd == null || pwd.trim() == "")
    	{
    		$(".passwordControl").addClass("error");
    		$(".passwordAlert span").text("没有密码可不能让你进.");
    		$(".passwordAlert").slideDown();
    		return;
    	}else{
    		$(".passwordControl").removeClass("error");
    		$(".passwordControl").addClass("success");
    		$(".passwordAlert").slideUp();
    	}
    });
    
    
    
    
    
    
    //--------------------------------------------------------------------------
    // register module
    //--------------------------------------------------------------------------
    $("#submitRegister").click(function(){

		$("#userIdInputR").blur();
		$("#emailInputR").blur();
		$("#passwordInputR").blur();
		$("#passwordInputR2").blur();
		$("#userNameInputR").blur();
    	
    	if($(".userIdControl").attr("class").indexOf("success") < 0
    			|| $(".userNameControl").attr("class").indexOf("success") < 0 
    			|| $(".passwordRControl").attr("class").indexOf("success") < 0 && $(".passwordRControl").attr("class").indexOf("warning") < 0  
    			|| $(".passwordR2Control").attr("class").indexOf("success") < 0 
    			|| $(".emailControl").attr("class").indexOf("success") < 0 && $(".emailControl").attr("class").indexOf("warning") < 0 ){
    		newMsgDiv("#dd6a45","亲，注册信息没填全哦。");
    	}else {
    		$("#registForm").submit();
    	}
    	
    	return false;
    });
    //-----------------------------------------------------------------------
    //	register form validation
    //-----------------------------------------------------------------------
    $("#userIdInputR").blur(function(){
    	
    	if($(this).val() == null || $(this).val().trim() == "")
    	{
    		$(".userIdControl").removeClass("success");
    		$(".userIdControl").removeClass("warning");
    		$(".userIdControl").addClass("error");
    		$(".userIdAlert").removeClass("alert-warning");
    		$(".userIdAlert").addClass("alert-error");
    		$(".userIdAlert span").text("邮箱怎么是空的呢.");
    		$(".userIdAlert").slideDown();
    		return ;
    	}
    	
    	if(CheckIdFormat($(this).val()))
    	{
    		$.ajax({
    			type: "POST",
    			url: "ajaxVerifyUserId.do",
    			dataType: "text",
    			data: "id="+$(this).val(),
    			success: function(data){
    				if(data == "exsit"){
    					$(".userIdControl").removeClass("success");
    		    		$(".userIdControl").removeClass("warning");
    					$(".userIdControl").addClass("error");
    		    		$(".userIdAlert").removeClass("alert-warning");
    		    		$(".userIdAlert").addClass("alert-error");
    		    		$(".userIdAlert span").text("额，该学工号已被注册了呢.");
    		    		$(".userIdAlert").slideDown();
    				}else
    				{
    					$(".userIdControl").removeClass("error");
    	    			$(".userIdControl").removeClass("warning");
    					$(".userIdControl").addClass("success");
    		    		$(".userIdAlert").removeClass("alert-error");
    		    		$(".userIdAlert").removeClass("alert-warning");
    		    		//$(".userIdAlert").addClass("alert-info");
		    			//$(".userIdAlert span").text("爱享欢迎您！");
		    			$(".userIdAlert").slideUp();
    				}
    			},
    			error: function(){
    				$(".userIdControl").removeClass("success");
    	    		$(".userIdControl").removeClass("error");
    				$(".userIdControl").addClass("warning");
    	    		$(".userIdAlert").removeClass("alert-error");
    	    		$(".userIdAlert").addClass("alert-warning");
		    		$(".userIdAlert span").text("额，网络出毛病了。.");
		    		$(".userIdAlert").slideDown();
    			}
    		});
    	}
    	else{
    		$(".userIdControl").removeClass("success");
    		$(".userIdControl").removeClass("warning");
    		$(".userIdControl").addClass("error");
    		$(".userIdAlert").removeClass("alert-warning");
    		$(".userIdAlert").addClass("alert-error");
    		$(".userIdAlert span").text("我们学院没有这个学工号呢.");
    		$(".userIdAlert").slideDown();
    	}
    	
    });
    
    $("#emailInputR").blur(function(){
    	if($(this).val() == null || $(this).val().trim() == "")
    	{
    		$(".emailControl").removeClass("success");
    		$(".emailControl").removeClass("warning");
			$(".emailControl").addClass("error");
    		$(".emailAlert").removeClass("alert-warning");
    		$(".emailAlert").addClass("alert-error");
    		$(".emailAlert span").text("亲，邮箱还没填哦.");
    		$(".emailAlert").slideDown();
    		return ;
    	}
    	
    	if(CheckEmailFormat($(this).val()))
    	{
//    		$.ajax({
//    			type: "POST",
//    			url: "ajaxVerifyEmail.do",
//    			dataType: "text",
//    			data: "email="+$(this).val(),
//    			success: function(data){
//    				if(data == "exsit"){
//    					$(".emailControl").removeClass("success");
//    		    		$(".emailControl").removeClass("warning");
//    					$(".emailControl").addClass("error");
//    		    		$(".emailAlert").removeClass("alert-warning");
//    		    		$(".emailAlert").addClass("alert-error");
//    		    		$(".emailAlert span").text("该邮箱已经被注册过哦.");
//    		    		$(".emailAlert").slideDown();
//    				}
//    				else{
//    					$(".emailControl").removeClass("error");
//    		    		$(".emailControl").removeClass("warning");
//    					$(".emailControl").addClass("success");
//    		    		$(".emailAlert").removeClass("alert-error");
//    		    		$(".emailAlert").removeClass("alert-warning");
//    		    		//$(".emailAlert").addClass("alert-info");
//    		    		//$(".emailAlert span").text("这个邮箱很OK.");
//    		    		$(".emailAlert").slideUp();
//    				}
//    			},
//    			error: function(){
//    				$(".emailControl").removeClass("error");
//		    		$(".emailControl").removeClass("success");
//					$(".emailControl").addClass("warning");
//		    		$(".emailAlert").removeClass("alert-error");
//		    		$(".emailAlert").addClass("alert-warning");
//		    		$(".emailAlert span").text("额，网络出毛病了。.");
//		    		$(".emailAlert").slideDown();
//    			}
//    		});
    	}
    	else{
    		$(".emailControl").removeClass("success");
    		$(".emailControl").removeClass("warning");
			$(".emailControl").addClass("error");
    		$(".emailAlert").removeClass("alert-warning");
    		$(".emailAlert").addClass("alert-error");
    		$(".emailAlert span").text("亲，邮箱貌似填错了哦.");
    		$(".emailAlert").slideDown();
    	}
    });
    
    $("#passwordInputR").blur(function(){
    	if($(this).val() == null || $(this).val() == ""){
    		$(".passwordRControl").removeClass("success");
    		$(".passwordRControl").removeClass("warning");
			$(".passwordRControl").addClass("error");
    		$(".passwordRAlert").removeClass("alert-warning");
    		$(".passwordRAlert").addClass("alert-error");
    		$(".passwordRAlert span").text("亲，密码必须得填呢.");
    		$(".passwordRAlert").slideDown();
    	}else if(!CheckPwdIntension($(this).val())){
    		$(".passwordRControl").removeClass("success");
    		$(".passwordRControl").removeClass("error");
			$(".passwordRControl").addClass("warning");
    		$(".passwordRAlert").removeClass("alert-error");
    		$(".passwordRAlert").addClass("alert-warning");
    		$(".passwordRAlert span").text("密码有点弱，小心被盗哦.");
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
    		$(".passwordR2Alert span").text("额，两次密码输得不同呢.");
    		$(".passwordR2Alert").slideDown();
    	}else if($(this).val() == null || $(this).val() == ""){
    		$(".passwordR2Control").removeClass("success");
    		//$(".passwordR2Control").removeClass("warning");
			$(".passwordR2Control").addClass("error");
    		$(".passwordR2Alert").removeClass("alert-warning");
    		$(".passwordR2Alert").addClass("alert-error");
    		$(".passwordR2Alert span").text("密码得输两次才不会错哦.");
    		$(".passwordR2Alert").slideDown();
    	}else{
    		$(".passwordR2Control").removeClass("error");
			$(".passwordR2Control").addClass("success");
    		$(".passwordR2Alert").slideUp();
    	}
    });
    
    $("#userNameInputR").blur(function(){
    	if($(this).val() == null || $(this).val() == ""){
    		$(".userNameControl").removeClass("success");
    		//$(".userNameControl").removeClass("warning");
			$(".userNameControl").addClass("error");
    		$(".userNameAlert").removeClass("alert-warning");
    		$(".userNameAlert").addClass("alert-error");
    		$(".userNameAlert span").text("亲，姓名必须得填呢.");
    		$(".userNameAlert").slideDown();
    	}else{
    		$(".userNameControl").removeClass("error");
    		//$(".userNameControl").removeClass("warning");
			$(".userNameControl").addClass("success");
    		$(".userNameAlert").slideUp();
    	}
    });
    
    //--------------------------------------------------------------------------
    // iCheck 
    //-------------------------------------------------------------------------- 
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat-orange',
        radioClass: 'iradio_flat-red'
    });
    
    
    
});

//---------------------------------------------------------
//	verification functions
//---------------------------------------------------------

function CheckIdFormat(s)
{
	if(s == null || s.trim() == "")
		return false;
		
	var pattern = /^[0-9]{1,20}$/;
	if(pattern.exec(s))
		return true;
	else
		return false;
}

function CheckEmailFormat(s)
{
	if(s == null || s.trim() == "")
		return false;
	
	var pattern = /^[a-z]([a-z0-9]*[-_]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[\.][a-z]{2,3}([\.][a-z]{2})?$/i;
	if(pattern.exec(s))
		return true;
	else
		return false;
}

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

function showAlert(theAlertString){
	$(theAlertString).slideDown();
	setTimeout(function(){
		$(theAlertString).slideUp();
	},2000);
}

