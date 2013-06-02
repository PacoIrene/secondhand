/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#addcommentfortopic").click(function(){
        var userid=$("#hidden_userid").attr("name");
        var topicid=$("#hidden_topicid").attr("name");
        var content=$("#topInfo-content-input").val();
        var url=$("#userPhoto").attr("src");
        if(content=="")
            var v=1;
           else{
                $.ajax({ 
                type: "POST", 
                url: "source/addcommenttotopic.php",
                dataType: "json", 
                data: {
                    "t":topicid,
                    "u":userid,
                    "c":content
                }, 
                success: function(json){
                    if(json.success==1){ 
                       var text1="<div class='topicInfo-reply-single'><div class='topInfo-Pic'>";
                       var text2="<a href='personal.html?userid="+userid+"'><img src='"+url+"'></a></div>";
                       var text3="<div class='topInfo-content'><div class='topInfo-title'>";
                       var text4="<a href='personal.html?userid="+userid+"'>"+$("#drop5").text()+"</a>";
                       var text5="<span>("+json.time+")</span>";
                       var text6="</div><div class='topInfo-info';><p>";
                       var text7="</p></div></div></div>";
                       var text=text1+text2+text3+text4+text5+text6+content+text7;
                       $(".topicInfo-reply").append(text); 
                       $("#topInfo-content-input").val("");
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
           }
       
    });
});

