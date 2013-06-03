<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
require 'UserOperation.php';
$userid=$_SESSION['UserId'];
$name=$_POST['registerFormname'];
$password=$_POST['registerFormpassword'];
$passwordr=$_POST['registerFormpasswordr'];
$photourl="img/logo.png";
if($passwordr==$password){
   $useropera=new UserOperation();
   $useropera->Init("localhost", "root", "root");
   $useropera->updateuser($userid, $name, $password, $photourl);
   $useropera->close();
   echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../personal.html\">";
}
else{
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../lose.html\">";
}
?>
