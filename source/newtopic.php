<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
session_start();
require 'TopicOperation.php';
$name=$_POST['topicInput-title-input'];
$content=$_POST['titleAndMail-mail-input'];
$time=date("Y-m-d H:i:s $cweekday[$cur_wday]");
$replynum=0;
$userid = $_SESSION['UserId'];
$groupid=$_POST["hidden_groupid"];
if ($userid) {
    $topic=new Topic($name, $content, $time, $replynum, $userid, $groupid);
    $topicopera=new TopicOperation();
    $topicopera->Init('localhost', 'root', 'root');
    $topicid=$topicopera->addtopic($topic);
    $topicopera->close();
    echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../singletopic.html?topicid=$topicid\">";
}
else{
    echo 'Please first login';
}
?>
