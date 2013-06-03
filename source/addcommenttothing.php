<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'UserOperation.php';
$t = $_POST["t"];
$u = $_POST["u"];
$c = $_POST["c"];
$time = date("Y-m-d H:i:s $cweekday[$cur_wday]");
$useropera=new UserOperation();
$useropera->Init("localhost", "root", "root");
$user=$useropera->getuser($u);
$conn = mysql_connect("localhost", "root", "root");
if (!$conn) {
    die('Could not connect to mysql');
}
mysql_select_db("secondhand", $conn);
$sql = "INSERT secondhand.thingcomment(time,content,userid,thingid) VALUES('$time','$c','$u','$t')";
$result = mysql_query($sql, $conn);
if (!$result) {
    die("Could not query the sql");
} else {
            $arr['success'] = 1;
            $arr['time'] = $time;
            $arr['url']=$user->photourl;
            echo json_encode($arr);
    }
?>
