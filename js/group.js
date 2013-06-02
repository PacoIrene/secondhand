/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
   $("#joinGroup").click(function(){
       var groupid=$("#hidden_groupid").attr("name");
       var userid=$("#hidden_userid").attr("name");
       $.ajax({ 
        type: "POST", 
        url: "source/joingroup.php",
        dataType: "json", 
        data: {"g":groupid,"u":userid}, 
        success: function(json){
            if(json.success==1){ 
                $("#joinGroup").removeClass("btn-success");
                $("#joinGroup").text("退出小组");
            }else{ 
               alert("网络环境异常");
                return false; 
            } 
        } ,
        error:function()
    	{
    		alert("网络环境异常");
    	}
    }); 
   }); 
   $("#exitGroup").click(function(){
       var groupid=$("#hidden_groupid").attr("name");
       var userid=$("#hidden_userid").attr("name");
       $.ajax({ 
        type: "POST", 
        url: "source/exitgroup.php",
        dataType: "json", 
        data: {"g":groupid,"u":userid}, 
        success: function(json){
            if(json.success==1){ 
                $("#exitGroup").addClass("btn-success");
                $("#exitGroup").text("加入该小组");
            }else{ 
               alert("网络环境异常");
                return false; 
            } 
        } ,
        error:function()
    	{
    		alert("网络环境异常");
    	}
    }); 
   });
});

