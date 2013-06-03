/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    
   
    $("#grouperList-more").click(function(){
       var pagenum=Number($("#hidden_pagenum").attr("name"));
        var classc=$("#hidden_class").attr("name");
        $("#grouperList-more").button('loading');
                $.ajax({ 
                type: "POST", 
                url: "source/moregroup.php",
                dataType: "json", 
                data: {
                    "c":classc,
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
                                    text+="<div class='result'><div class='resultPic'><a href=group.html?groupid="+json[o];
                                }
                                else if(num%6==1){
                                    text+="><img src='"+json[o]+"'></a></div><div class='resultContent'><div class='resultTitle'>";
                                }
                                else if(num%6==2){
                                    text+="<h3><a href=group.html?groupid="+json[o]+">";
                                }
                                else if(num%6==3){
                                    text+=json[o]+"</a></h3></div><div class='resultInfo'><p>";
                                }
                                else if(num%6==4){
                                     text+=json[o]+"</p></div><div class='resultJoin'>";
                                }
                                else if(num%6==5){
                                   text+="<a class='joinhref' id='"+json[o]+"'  href='javascript:;' name='"+json[o]+"'>+ 加入小组</a></div></div></div>";
                                }
                            }
                        }
                        if(totalnumnow/6<10)
                            {
                                $("#grouperList-more").hide();
                            }
                        $("#grouperList-more").before(text);
                        $("#grouperList-more").button('reset');
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
//    $(".resultJoin>a").live("click",function(){
//        var groupid=$(this).attr("name");
//        alert(groupid);
//        alert("hello");
//    });
});

