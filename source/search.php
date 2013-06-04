<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
unset($_SESSION['SearchValue']);
$searchvalue=$_POST["searchinputvalue"];

$_SESSION['SearchValue']=$searchvalue;
$classs=$_GET["class"];
if($classs=="1")
    $classs=1;
if($classs=="0")
    $classs=0;
if($classs=="2")
    $classs=2;
if($classs==null)
    $classs=0;
if($searchvalue==null)
    $classs=3;
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../searchresult.html?class=".$classs."\">";
?>
