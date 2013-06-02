<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$t=$_POST["t"];
$u=$_POST["u"];
$c=$_POST["c"];
$time=date("Y-m-d H:i:s $cweekday[$cur_wday]");
$conn = mysql_connect("localhost","root","root");
if (!$conn) {
            die('Could not connect to mysql');
        }
mysql_select_db("secondhand", $conn);
$sql="INSERT secondhand.topicreply(content,time,userid,topicid) VALUES('$c','$time','$u','$t')";
$result=  mysql_query($sql,$conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
            $arr['success'] = 1; 
            $arr['time']=$time;
            echo json_encode($arr);
        }
?>
