<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'UserOperation.php';
$p=$_POST["p"];
$u=$_POST["u"];
$c=$_POST["c"];
$pnum=$p*10;
$useropera=new UserOperation();
$useropera->Init("localhost", "root", "root");
if($c==0)
    $sql="SELECT * FROM secondhand.mail WHERE receiveid='$u' AND deleted IN(0,1) ORDER BY time DESC LIMIT $pnum,10";
else
    $sql="SELECT * FROM secondhand.mail WHERE sendid='$u' AND deleted IN(0,2) ORDER BY time DESC LIMIT $pnum,10";
$conn = mysql_connect("localhost","root","root");
$result=  mysql_query($sql, $conn);
if(!$result){
            die('Could not query the sql');
        }
        else{
            $num =  mysql_num_rows ($result);
            $topic=array();
            for($i=0;$i<$num;$i=$i+1){
                $row=mysql_fetch_array($result);
                if($c==0)
                    $userhere=$useropera->getuser($row["sendid"]);
                else
                    $userhere=$useropera->getuser($row["receiveid"]);
                $arr[]=($userhere->id);
                $arr[]=($userhere->name);
                $arr[]=($row["id"]);
                 $length=strlen($row["title"]);
                                    if($length>24)
                                        $pcontent=substr($row["title"],0,24)."...";
                                    else
                                        $pcontent=$row["title"];
                $arr[]=($pcontent);
                $arr[]=($row["time"]);
                $arr[]=($row["id"]);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
        }
?>
