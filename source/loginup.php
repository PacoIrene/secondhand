<?php
header("Content-type:text/html;charset=utf-8");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'UserOperation.php';
$name=$_POST['registerFormname'];
$email=$_POST['registerFormemail'];
$password=$_POST['registerFormpassword'];
$photourl="img/logo.png";
if($name!=null&&$email!=null&&$password!=null){
    $user=new User($name,$email,$password,$photourl);
$useropera=new UserOperation();
$useropera->Init('localhost', 'root', 'root');
$useropera->adduser($user);
$useropera->close();
 echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../index.html\">";
}
?>
