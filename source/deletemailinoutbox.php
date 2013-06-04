<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
$userid=$_SESSION["UserId"];
$m=$_POST["m"];
$c=$_POST["c"];
if($userid!=null){
    $conn = mysql_connect("localhost","root","root");
    $result=  mysql_query($sql, $conn);
    if($c==0){
        $sql1="UPDATE secondhand.mail SET deleted=2 WHERE receiveid='$userid' AND id='$m' AND deleted=0";
        $sql2="UPDATE secondhand.mail SET deleted=3 WHERE receiveid='$userid' AND id='$m' AND deleted=1";
        $result1 = mysql_query($sql1, $conn);
        $result2 = mysql_query($sql2, $conn);
    }
    else{
        $sql1="UPDATE secondhand.mail SET deleted=1 WHERE sendid='$userid' AND id='$m' AND deleted=0";
        $sql2="UPDATE secondhand.mail SET deleted=3 WHERE sendid='$userid' AND id='$m' AND deleted=2";
        $result1 = mysql_query($sql1, $conn);
        $result2 = mysql_query($sql2, $conn);
    }
    if (!$result2&&!$result1) {
            die("Could not query the sql");
        } else {
            $arr['success'] = 1;
            echo json_encode($arr);
        }
        
}
else{
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../index.html\">";
}

?>
