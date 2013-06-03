<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
require 'GroupOperation.php';
$g=$_POST["g"];
$u=$_POST["u"];
$conn = mysql_connect("localhost","root","root");
if (!$conn) {
            die('Could not connect to mysql');
        }
$groupera=new GroupOperation();
$groupera->Init("localhost","root","root");
$decide=$groupera->isin($u, $g);
if(!$decide)
{
    mysql_select_db("secondhand", $conn);
$sql="INSERT secondhand.usergroup(userid,groupid) VALUES('$u','$g')";
$result=  mysql_query($sql,$conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
           $sql1 = "SELECT usernum FROM secondhand.group WHERE id='$g'";
    $result1 = mysql_query($sql1, $conn);
    if (!$result1) {
        die("Could not query the sql");
    } else {
        $row1 = mysql_fetch_array($result1);
        $newnum = $row1["usernum"] + 1;
        $sql2 = "UPDATE secondhand.group SET usernum='$newnum' WHERE id='$g'";
        $result2 = mysql_query($sql2, $conn);
        if (!$result2) {
            die("Could not query the sql");
        } else {
            $arr['success'] = 1;
            echo json_encode($arr);
        }
    }
        }
}

?>
