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
$sql="SELECT groupid FROM secondhand.usergroup WHERE userid='$u'";
$result=  mysql_query($sql, $conn);
        if(!$result){
            die('Could not query the sql');
        }
        $chars=array();
        $num=  mysql_num_rows($result);
        for($i=0;$i!=$num;$i++)
        {
            $row=  mysql_fetch_array($result);
            $chars[]=$row["topicid"];
        }
        foreach($chars as $color)  
        {  
            $text=$text."'".(string)$color."',";
        }  
       $lenght=strlen($text);
        $text=substr($text,1,$lenght-3);
         $sql1="SELECT * FROM secondhand.topic WHERE groupid IN ('$text') ORDER BY updatetime DESC LIMIT $pnum,10";
         $result1=  mysql_query($sql1, $conn);
        if(!$result1){
            die('Could not query the sql');
        }
        else
        {
            $num3 =  mysql_num_rows ($result1);
            for($i=0;$i<$num3;$i=$i+1){
                $row3=mysql_fetch_array($result1);
                $arr[]=($row3["id"]);
                $arr[]=($row3["name"]);
                $arr[]=($row3["groupid"]);
                $grouphere=$groupopera->getgroup($row3['groupid']);
                $arr[]=($grouphere->name);
                $arr[]=($row3["replynum"]);
                $arr[]=($row3["updatetime"]);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
            $groupopera->close();
        }
?>
