<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
require 'GroupOperation.php';
$title=$_POST['groupInfoPart-title-input'];
$content=$_POST['titleAndMail-description-input'];
$class=$_POST['groupclass'];
$url='img/logo.png';
$username = $_SESSION['UserName'];
if ($username) {
    $group=new Group($title,$content,$url,$class);
    $groupopera=new GroupOperation();
    $groupopera->Init('localhost', 'root', 'root');
    $groupid=$groupopera->addgroup($group);
    $groupopera->close();
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../group.html?groupid=$groupid\">";
}
else{
    echo 'Please first login';
}
?>
