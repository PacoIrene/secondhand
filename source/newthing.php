<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
require 'ThingOperation.php';
$name=$_POST['thingInput-title-input'];
$class=$_POST['thingclass'];
$description=$_POST["thingInput-area-input"];
$photourl="img/logo.png";
$username = $_SESSION['UserName'];
if ($username) {
    $thing=new Thing($name,$class,$description,$photourl);
    $thingopera=new ThingOperation();
    $thingopera->Init('localhost', 'root', 'root');
    $thingid=$thingopera->addthing($thing);
    $thingopera->close();
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../thing.html?thingid=$thingid\">";
}
else{
    echo 'Please first login';
}
?>
