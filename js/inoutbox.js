/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    $("#grouperList-more").bind("click",function(){
    var pagenum=Number($("#hidden_pagenum").attr("name"));
        var userid=$("#hidden_userid").attr("name");
        var classs=$("#hidden_class").attr("name");
        $("#grouperList-more").button('loading');
        $.ajax({ 
                type: "POST", 
                url: "source/moreinoutboxmail.php",
                dataType: "json", 
                data: {
                    "u":userid,
                    "p":pagenum,
                    "c":classs
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
                                    text+="<tr><td><a class='inoutLink' style='text-decoration: none;' href='personal.html?userid="+json[o]+"'>";
                                }
                                else if(num%6==1){
                                    text+=json[o]+"</a></td>";
                                }
                                else if(num%6==2){
                                    text+="<td><a class='inoutLink' style='text-decoration: none;' href='mailinfo.html?mailid="+json[o]+"'>"
                                }
                                else if(num%6==3){
                                    text+=json[o]+"</a></td>";
                                }
                                 else if(num%6==4){
                                    text+="<td>"+json[o]+"</td>";
                                }
                                 else if(num%6==5){
                                    text+="<td><a  style='text-decoration: none;color: #072;'href='source/deletemail.php?mailid="+json[o]+"' class='deleteMailButton' href='javascript:;' >删除</a></td>";
                                }
                            }
                        }
                        if(totalnumnow/6<10)
                            {
                                $("#grouperList-more").hide();
                            }
                        $("#inoutboxtable").append(text);
                        $("#grouperList-more").button('reset');
                        $("#hidden_pagenum").attr("name",String(pagenum+1))
                    }else{ 
                        newMsgDiv("#dd6a45","网络环境异1常.");
                        return false; 
                    } 
                } ,
                error:function()
                {
                    newMsgDiv("#dd6a45","网络环境异常.");
                }
            }); 
     });
    $(".deleteMailButton").live("click",function(){
        var mailid=$(this).attr("name");
        var classs=$("#hidden_class").attr("name");
        var here=$(this).parent().parent();
        $.ajax({ 
                type: "POST", 
                url: "source/deletemailinoutbox.php",
                dataType: "json", 
                data: {
                    "m":mailid,
                    "c":classs
                }, 
                success: function(json){
                    if(json.success==1){ 
                       here.remove();
                       newMsgDiv("#72","删除成功");
                    }else{ 
                        newMsgDiv("#dd6a45","网络环境异1常.");
                        return false; 
                    } 
                } ,
                error:function()
                {
                    newMsgDiv("#dd6a45","网络环境异常.");
                }
            }); 
    });
     
});

