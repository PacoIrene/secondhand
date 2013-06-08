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
$photourl=$_POST['hidden_photourl'];
if($passwordr==$password){
   $useropera=new UserOperation();
   $useropera->Init("localhost", "root", "root");
   $user=$useropera->getuser($userid);
   if($password==null)
       $password=$user->password;
   if($name==null)
       $name=$user->name;
   if($photourl==null)
       $photourl=$user->photourl;
   $useropera->updateuser($userid, $name, $password, $photourl);
   $useropera->close();
   $_SESSION['UserName']=$name;
   echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../personal.html\">";
}
else{
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../lose.html\">";
}
?>
