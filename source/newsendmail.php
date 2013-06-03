<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

header("Content-type:text/html;charset=utf-8");
session_start();
require 'MailOperation.php';
$sendid=$_SESSION['UserId'];
$receiveid=$_POST["hiddenuserid"];
$title=$_POST['titleAndMail-title-input'];
$content=$_POST['titleAndMail-mail-input'];
$time=date("Y-m-d H:i:s $cweekday[$cur_wday]");
$username = $_SESSION['UserName'];
if ($username) {
    $mail=new Mail($sendid, $receiveid, $title, $content, $time, 0);
    $mailopera=new MailOperation();
    $mailopera->Init("localhost", "root", "root");
    $mailid=$mailopera->addmail($mail);
    $mailopera->close();
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../mailinfo.html?mailid=$mailid\">";
}
else{
    echo 'Please first login';
}
?>
