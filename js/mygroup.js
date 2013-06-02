/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
     $("#grouperList-more").click(function(){
    var pagenum=Number($("#hidden_pagenum").attr("name"));
        var userid=$("#hidden_userid").attr("name");
        $("#grouperList-more").button('loading');
        $.ajax({ 
                type: "POST", 
                url: "source/moremygroup.php",
                dataType: "json", 
                data: {
                    "u":userid,
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
                                if(num%4==0){
                                    text+="<dl class='groupList-li'><dt><a href='group.html?groupid="+json[o]+"'><img src='";
                                }
                                else if(num%4==1){
                                    text+=json[o]+"' class='img-rounded'></a></dt><dd>";
                                }
                                else if(num%4==2){
                                    text+="<a href='group.html?groupid="+json[o]+"'>";
                                }
                                else if(num%4==3){
                                    text+=json[o]+"</a></dd></dl>";
                                }
                            }
                        }
                        if(totalnumnow/4<10)
                            {
                                $("#grouperList-more").hide();
                            }
                        $(".groupList").append(text);
                        $("#grouperList-more").button('reset');
                        $("#hidden_pagenum").attr("name",String(pagenum+1))
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
});
