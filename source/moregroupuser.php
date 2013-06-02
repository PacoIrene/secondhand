<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'UserOperation.php';
$p=$_POST["p"];
$g=$_POST["g"];
$pnum=$p*10;
$conn = mysql_connect("localhost","root","root");
$useropera=new UserOperation();
$useropera->Init('localhost', 'root', 'root');
if (!$conn) {
            die('Could not connect to mysql');
        }
mysql_select_db("secondhand", $conn);
$sql="SELECT * FROM secondhand.usergroup WHERE groupid='$g' LIMIT $pnum,10 ";
$result=  mysql_query($sql,$conn);
        if(!$result){
            die("Could not query the sql");
        }
        else
        {
            $num =  mysql_num_rows ($result);
            $topic=array();
            for($i=0;$i<$num;$i=$i+1){
                $row=mysql_fetch_array($result);
                $arr[]=($row["userid"]);
                $userhere=$useropera->getuser($row['userid']); 
                $arr[]=($userhere->photourl);
                $arr[]=($userhere->name);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
            $useropera->close();
        }
?>
