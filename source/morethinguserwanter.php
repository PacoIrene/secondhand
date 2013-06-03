<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'UserOperation.php';
$p=$_POST["p"];
$c=$_POST["c"];
$t=$_POST["t"];
$pnum=$p*10;
$useropera=new UserOperation();
$useropera->Init("localhost", "root", "root");
if($c==0)
    $sql="SELECT * FROM secondhand.buything WHERE thingid='$t' LIMIT $pnum,10";
else
    $sql="SELECT * FROM secondhand.sellthing WHERE thingid='$t' LIMIT $pnum,10";
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
                $userhere=$useropera->getuser($row["userid"]);
                $arr[]=($row["userid"]);
                $arr[]=($userhere->photourl);
                $arr[]=($row["userid"]);
                $arr[]=($userhere->name);
               $arr[]=($row["time"]);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
        }

?>
