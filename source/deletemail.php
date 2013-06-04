<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
require 'MailOperation.php';
$mailid=$_GET["mailid"];
$userid=$_SESSION["UserId"];
$mailopera=new MailOperation();
$mailopera->Init("localhost","root","root");
$issender=$mailopera->issender($mailid, $userid);
$isreceiver=$mailopera->isreceived($mailid, $userid);
if($userid!=null){
    $conn = mysql_connect("localhost","root","root");
    $result=  mysql_query($sql, $conn);
    if($isreceiver){
        $sql1="UPDATE secondhand.mail SET deleted=2 WHERE receiveid='$userid' AND id='$mailid' AND deleted=0";
        $sql2="UPDATE secondhand.mail SET deleted=3 WHERE receiveid='$userid' AND id='$mailid' AND deleted=1";
      
        $result1 = mysql_query($sql1, $conn);
        $result2 = mysql_query($sql2, $conn);
    }
    if($issender){
        $sql1="UPDATE secondhand.mail SET deleted=1 WHERE sendid='$userid' AND id='$mailid' AND deleted=0";
        $sql2="UPDATE secondhand.mail SET deleted=3 WHERE sendid='$userid' AND id='$mailid' AND deleted=2";
       
        $result1 = mysql_query($sql1, $conn);
        $result2 = mysql_query($sql2, $conn);
    }
    if (!$result2&&!$result1) {
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../lose.html\">";
        } else {
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../inoutbox.html\">";
        }
        
}
else{
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../index.html\">";
}
?>
