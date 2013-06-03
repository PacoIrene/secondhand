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
    $("#thingComment-more").click(function(){
         var pagenum=Number($("#hidden_pagenum").attr("name"));
        var thingid=$("#hidden_thingid").attr("name");
         $("#thingComment-more").button('loading');
         $.ajax({ 
                type: "POST", 
                url: "source/morethingcomment.php",
                dataType: "json", 
                data: {
                    "t":thingid,
                    "p":pagenum
                }, 
                success: function(json){
                    if(json.success==1){ 
                        var text="";
                        var totalnumnow=0;
                        for(var o in json){
                            var num=Number(o);
                            if(o!="success")
                            {
                                totalnumnow+=1;
                                if(num%6==0){
                                    text+="<div class='thingComment-single'><div class='thingComment-Pic'><a href='personal.html?userid="+json[o]+"'><img src='";
                                }
                                else if(num%6==1){
                                    text+=json[o]+"'></a></div><div class='thingComment-content'><div class='thingComment-title'>";
                                }
                                else if(num%6==2){
                                    text+="<a href='personal.html?userid="+json[o]+"'>";
                                }
                                else if(num%6==3){
                                    text+=json[o]+"</a>";
                                }
                                else if(num%6==4){
                                     text+="<span>("+json[o]+")</span>";
                                }
                                else if(num%6==5){
                                   text+="</div><div class='thingComment-info';><p>"+json[o]+"</p></div></div></div>";
                                }
                            }
                        }
                        if(totalnumnow/6<10)
                            {
                                $("#thingComment-more").hide();
                            }
                        $("#thingComment-more").before(text);
                        $("#thingComment-more").button('reset');
                        $("#hidden_pagenum").attr("name",String(pagenum+1));
                    }else{ 
                        newMsgDiv("#dd6a45","网络环境异常.");
                        return false; 
                    } 
                } ,
                error:function()
                {
                    newMsgDiv("#dd6a45","网络环境异常.");
                }
     });
    });
    $("#addCommentToThing").click(function(){
         var userid=$("#hidden_userid").attr("name");
        var thingid=$("#hidden_thingid").attr("name");
        var content=$("#thingContent-comment-input").val();
        if(content=="")
            var v=1;
           else{
                $.ajax({ 
                type: "POST", 
                url: "source/addcommenttothing.php",
                dataType: "json", 
                data: {
                    "t":thingid,
                    "u":userid,
                    "c":content
                }, 
                success: function(json){
                    if(json.success==1){ 
                       var text1="<div class='thingComment-single'><div class='thingComment-Pic''>";
                       var text2="<a href='personal.html?userid="+userid+"'><img src='"+json.url+"'></a></div>";
                       var text3="<div class='thingComment-content'><div class='thingComment-title'>";
                       var text4="<a href='personal.html?userid="+userid+"'>"+$("#drop5").text()+"</a>";
                       var text5="<span>("+json.time+")</span>";
                       var text6="</div><div class='thingComment-info';><p>";
                       var text7="</p></div></div></div>";
                       var text=text1+text2+text3+text4+text5+text6+content+text7;
                       $(".thingContent-comment").after(text); 
                       $("#thingContent-comment-input").val("");
                    }else{ 
                        newMsgDiv("#dd6a45","网络环境异常.");
                        return false; 
                    } 
                } ,
                error:function()
                {
                   newMsgDiv("#dd6a45","网络环境异常.");
                }
            }); 
           }
    });
});