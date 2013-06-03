<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$t = $_POST["t"];
$u = $_POST["u"];
$c = $_POST["c"];
$time = date("Y-m-d H:i:s $cweekday[$cur_wday]");
$conn = mysql_connect("localhost", "root", "root");
if (!$conn) {
    die('Could not connect to mysql');
}
mysql_select_db("secondhand", $conn);
$sql = "INSERT secondhand.topicreply(content,time,userid,topicid) VALUES('$c','$time','$u','$t')";
$result = mysql_query($sql, $conn);
if (!$result) {
    die("Could not query the sql");
} else {
    $sql1 = "SELECT replynum FROM secondhand.topic WHERE id='$t'";
    $result1 = mysql_query($sql1, $conn);
    if (!$result1) {
        die("Could not query the sql");
    } else {
        $row1 = mysql_fetch_array($result1);
        $newnum = $row1["replynum"] + 1;
        $sql2 = "UPDATE secondhand.topic SET replynum='$newnum',updatetime='$time' WHERE id='$t'";
        $result2 = mysql_query($sql2, $conn);
        if (!$result2) {
            die("Could not query the sql");
        } else {
            $arr['success'] = 1;
            $arr['time'] = $time;
            echo json_encode($arr);
        }
    }
}
?>
