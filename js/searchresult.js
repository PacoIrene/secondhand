/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(){
    
   
    $("#wanterList-more").click(function(){
       var pagenum=Number($("#hidden_pagenum").attr("name"));
        var classc=$("#hidden_class").attr("name");
        var value=$("#hidden_value").attr("name");
        $("#wanterList-more").button('loading');
                $.ajax({ 
                type: "POST", 
                url: "source/moresearchlist.php",
                dataType: "json", 
                data: {
                    "c":classc,
                    "p":pagenum,
                    "v":value
                }, 
                success: function(json){
                    if(json.success==1){ 
                        var text="";
                        alert(text);
                        var totalnumnow=0;
                        for(var o in json){
                            var num=Number(o);
                            if(o!="success"&&classc!=0)
                            {
                                totalnumnow+=1;
                                if(num%5==0){
                                    text+="<div class='result'><div class='resultPic'><a href=thing.html?thingid="+json[o];
                                }
                                else if(num%5==1){
                                    text+="><img src='"+json[o]+"'></a></div><div class='resultContent'><div class='resultTitle'>";
                                }
                                else if(num%5==2){
                                    text+="<h3><a href=thing.html?thingid="+json[o]+">";
                                }
                                else if(num%5==3){
                                    text+=json[o]+"</a></h3></div><div class='resultInfo'><p>";
                                }
                                else if(num%5==4){
                                     text+=json[o];
                                     text+="</p></div></div></div>";
                                }
                            }
                            if(o!="success"&&classc==0){
                                totalnumnow+=1;
                                if(num%4==0){
                                    text+="<div class='result'><div class='resultPic'><a href=thing.html?thingid="+json[o];
                                }
                                else if(num%4==1){
                                    text+="><img src='"+json[o]+"'></a></div><div class='resultContent'><div class='resultTitle'>";
                                }
                                else if(num%4==2){
                                    text+="<h3><a href=thing.html?thingid="+json[o]+">";
                                }
                                else if(num%4==3){
                                    text+=json[o]+"</a></h3></div><div class='resultInfo'><p></p></div></div></div>";
                                }
                            }
                        }
                        if(totalnumnow/5<1&&classc!=0)
                            {
                                $("#wanterList-more").hide();
                            }
                            if(totalnumnow/4<1&&classc==0)
                            {
                                $("#wanterList-more").hide();
                            }
                            alert(text);
                        $("#wanterList-more").before(text);
                        $("#wanterList-more").button('reset');
                        $("#hidden_pagenum").attr("name",String(pagenum+1));
                    }else{ 
                        newMsgDiv("#dd6a45","网络环境1异常.");
                        return false; 
                    } 
                } ,
                error:function()
                {
                    newMsgDiv("#dd6a45","网络环境异1常.");
                }
     }); 
    });
});

