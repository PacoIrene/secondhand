<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'ThingOperation.php';
$p=$_POST["p"];
$c=$_POST["c"];
$pnum=$p*10;
if($c==0)
    $sql="SELECT * FROM secondhand.thing  LIMIT $pnum,10";
else
    $sql="SELECT * FROM secondhand.thing WHERE class='$class' LIMIT $pnum,10";
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
                $arr[]=($row["id"]);
                $arr[]=($row["photourl"]);
                $arr[]=($row["id"]);
                $arr[]=($row["name"]);
                $length=strlen($row["description"]);
                                    if($length>60)
                                        $pcontent=substr($row["description"],0,60)."...";
                                    else
                                        $pcontent=$row["description"];
                $arr[]=($pcontent);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
        }

?>
