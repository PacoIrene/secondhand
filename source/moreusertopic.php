<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'GroupOperation.php';
$p=$_POST["p"];
$u=$_POST["u"];
$pnum=$p*10;
$conn = mysql_connect("localhost","root","root");
$groupopera=new GroupOperation();
$groupopera->Init('localhost', 'root', 'root');
if (!$conn) {
            die('Could not connect to mysql');
        }
mysql_select_db("secondhand", $conn);
$sql="SELECT * FROM secondhand.topic WHERE userid='$u' ORDER BY updatetime DESC LIMIT $pnum,10";
$result=  mysql_query($sql,$conn);
        if(!$result){
            die("Could not query the sql");
        }
        else
        {
            $num =  mysql_num_rows ($result);
            for($i=0;$i<$num;$i=$i+1){
                $row=mysql_fetch_array($result);
                $arr[]=($row["id"]);
                $arr[]=($row["name"]);
                $arr[]=($row["groupid"]);
                $grouphere=$groupopera->getgroup($row['groupid']);
                $arr[]=($grouphere->name);
                $arr[]=($row["replynum"]);
                $arr[]=($row["updatetime"]);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
            $groupopera->close();
        }
?>
