<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'UserOperation.php';
$name=$_POST['username'];
$password=$_POST['password'];
$useropera=new UserOperation();
$useropera->Init('localhost', 'root', 'root');
$char=$useropera->finduser($name, $password);
if($char){
    session_start();
    $_SESSION['UserName'] = $char['name'];
    $_SESSION['UserId']=$char['id'];
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../personal.html\">";
}
else{
   echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../index.html\">";
}
$useropera->close();
?>
