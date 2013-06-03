/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function(){
    
   
    $("#grouperList-more").click(function(){
       var pagenum=Number($("#hidden_pagenum").attr("name"));
        var classc=$("#hidden_class").attr("name");
        var userid=$("#hidden_userid").attr("name");
        $("#grouperList-more").button('loading');
                $.ajax({ 
                type: "POST", 
                url: "source/mywantmorething.php",
                dataType: "json", 
                data: {
                    "c":classc,
                    "p":pagenum,
                    "u":userid
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
                                     text+=json[o]+"</p></div></div></div>";
                                }
                            }
                        }
                        if(totalnumnow/5<10)
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
});