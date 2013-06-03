/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
     $("#topicMore").click(function(){
    var pagenum=Number($("#hidden_pagenum").attr("name"));
        var userid=$("#hidden_userid").attr("name");
        $("#topicMore").button('loading');
        $.ajax({ 
                type: "POST", 
                url: "source/moreuserreplytopic.php",
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
                                if(num%6==0){
                                    text+="<tr><td><a href='singletopic.html?topicid="+json[o]+"'>";
                                }
                                else if(num%6==1){
                                    text+=json[o]+"</a></td>";
                                }
                                else if(num%6==2){
                                    text+="<td><a href='group.html?groupid="+json[o]+"'>";
                                }
                                else if(num%6==3){
                                    text+=json[o]+"</a></td>";
                                }
                                else if(num%6==4){
                                     text+="<td>"+json[o]+"</td>";
                                }
                                else if(num%6==5){
                                   text+="<td>"+json[o]+"</td></tr>";
                                }
                            }
                        }
                        if(totalnumnow/6<10)
                            {
                                $("#topicMore").hide();
                            }
                        $("#topicTableBody").append(text);
                        $("#topicMore").button('reset');
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
});


