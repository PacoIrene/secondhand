<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'ThingOperation.php';
session_start();
$thingid=$_GET["thingid"];
$userid = $_SESSION['UserId'];
if ($userid) {
     $thingopera=new ThingOperation();;
     $thingopera->Init('localhost', 'root', 'root');
     $isbuy=$thingopera->isinbuy($userid,$thingid);
     if(!$isbuy){
         $conn = mysql_connect("localhost","root","root");
        if (!$conn) {
                    die('Could not connect to mysql');
                }
         $sql="INSERT secondhand.buything(userid,thingid) VALUES('$userid','$thingid')";
         $result=  mysql_query($sql,$conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../thing.html?thingid=$thingid\">";
        }
     }
}
else{
    echo 'Please first login';
}
?>
