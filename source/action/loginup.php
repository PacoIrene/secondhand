<?php
header("Content-type:text/html;charset=utf-8");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require '../opera/UserOperation.php';
$name=$_POST['registerFormname'];
$email=$_POST['registerFormemail'];
$password=$_POST['registerFormpassword'];
$user=new User($name,$email,$password);
$useropera=new UserOperation();
$useropera->Init('localhost', 'root', 'root');
$useropera->adduser($user);
$useropera->close();
 echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../../index.html\">";
?>
