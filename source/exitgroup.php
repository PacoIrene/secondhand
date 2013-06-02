<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$g=$_POST["g"];
$u=$_POST["u"];
$conn = mysql_connect("localhost","root","root");
if (!$conn) {
            die('Could not connect to mysql');
        }
mysql_select_db("secondhand", $conn);
$sql="DELETE FROM secondhand.usergroup WHERE userid='$u' AND groupid='$g'";
$arr['sql']=$sql;
$result=  mysql_query($sql,$conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
            $arr['success'] = 1; 
            echo json_encode($arr);
        }
?>
