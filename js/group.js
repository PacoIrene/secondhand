/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    $("#groupPerson-grouperList-more").click(function(){
        var userpage=Number($("#hidden_userpage").attr("name"));
        var groupid=$("#hidden_groupid").attr("name");
        $("#groupPerson-grouperList-more").button('loading');
        $.ajax({ 
                type: "POST", 
                url: "source/moregroupuser.php",
                dataType: "json", 
                data: {
                    "g":groupid,
                    "p":userpage
                }, 
                success: function(json){
                    if(json.success==1){ 
                        var text="";
                        var totalnumnow=0;
                        for(var o in json){
                            var num=Number(o);
                            alert(num);
                            if(o!="success")
                            {
                                totalnumnow+=1;
                                if(num%3==0){
                                    text+="<a href=personal.html?userid="+json[o]+"><img src='";                                }
                                else if(num%3==1){
                                    text+=json[o]+"' class='img-rounded' ";
                                }
                                else if(num%3==2){
                                    text+="title="+json[o]+"></a>";
                                }
                            }
                        }
                        alert(text);
                        if(totalnumnow/3<10)
                            {
                                $("#groupPerson-grouperList-more").hide();
                            }
                        $(".groupPerson-grouperList").append(text);
                        $("#groupPerson-grouperList-more").button('reset');
                        $("#hidden_userpage").attr("name",String(userpage+1));
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
    $("#groupBasicTopic-topic-more").click(function(){
        var pagenum=Number($("#hidden_pagenum").attr("name"));
        var groupid=$("#hidden_groupid").attr("name");
        $("#groupBasicTopic-topic-more").button('loading');
        $.ajax({ 
                type: "POST", 
                url: "source/moregrouptopic.php",
                dataType: "json", 
                data: {
                    "g":groupid,
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
                                    text+="<td><a href='personal.html?userid="+json[o]+"'>";
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
                        if(totalnumnow/6<2)
                            {
                                $("#groupBasicTopic-topic-more").hide();
                            }
                        $("#topicTableBody").append(text);
                        $("#groupBasicTopic-topic-more").button('reset');
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
    $("#joinGroup").click(function(){
        var groupid=$("#hidden_groupid").attr("name");
        var userid=$("#hidden_userid").attr("name");
        if($("#joinGroup").hasClass("btn-success"))
        {
            $.ajax({ 
                type: "POST", 
                url: "source/joingroup.php",
                dataType: "json", 
                data: {
                    "g":groupid,
                    "u":userid
                }, 
                success: function(json){
                    if(json.success==1){ 
                        $("#joinGroup").removeClass("btn-success");
                        $("#joinGroup").text("退出小组");
                        $(".showandhidden").show();
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
        else{
            $.ajax({ 
                type: "POST", 
                url: "source/exitgroup.php",
                dataType: "json", 
                data: {
                    "g":groupid,
                    "u":userid
                }, 
                success: function(json){
                    if(json.success==1){ 
                        $("#joinGroup").addClass("btn-success");
                        $("#joinGroup").text("加入该小组");
                        $(".showandhidden").hide();
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

