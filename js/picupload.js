/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


function getSizes(im,obj)
{
var x_axis = obj.x1;
var x2_axis = obj.x2;
var y_axis = obj.y1;
var y2_axis = obj.y2;
var thumb_width = obj.width;
var thumb_height = obj.height;
if(thumb_width > 0)
{
if(confirm("Do you want to save image..!"))
{
$.ajax({
type:"GET",
url:"ajax_image.php?t=ajax&img="+$("#image_name").val()+"&w="+
thumb_width+"&h="+thumb_height+"&x1="+x_axis+"&y1="+y_axis,
cache:false,
success:function(rsponse)
{
$("#cropimage").hide();
$("#thumbs").html("");
$("#thumbs").html("<img src='uploads/"+rsponse+"' />");
}
});
}
}
else
alert("Please select portion..!");
}
$(document).ready(function () 
{
$('img#photo').imgAreaSelect({
aspectRatio: '1:1',
onSelectEnd: getSizes
});
});