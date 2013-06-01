<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require '../opera/UserOperation.php';
$name=$_POST['username'];
$password=$_POST['password'];
echo $name;
echo $password;
$useropera=new UserOperation();
$useropera->Init('localhost', 'root', 'root');
$char=$useropera->finduser($name, $password);
if($char){
    session_start();
    $_SESSION['UserName'] = $char['name'];
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../../personal.html\">";
}
else{
    echo 'error';
}
$useropera->close();
?>
