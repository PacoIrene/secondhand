<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
//$searchvalue=$_POST["v"];
//$p=$_POST["p"];
//$c=$_POST["c"];
$searchvalue="大";
$p=1;
$c=0;
$pnum=$p*1;
if($c==0)
    $sql="SELECT * FROM secondhand.user WHERE name like '%$searchvalue%' LIMIT $pnum,1";
elseif($c==1)
    $sql="SELECT * FROM secondhand.group WHERE name like '%$searchvalue%' LIMIT $pnum,1";
elseif($c==2)
    $sql="SELECT * FROM secondhand.thing WHERE name like '%$searchvalue%' LIMIT $pnum,1";
echo $sql;
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
                if($c!=0){
                     $length=strlen($row["description"]);
                                    if($length>57)
                                        $pcontent=substr($row["description"],0,57)."...";
                                    else
                                        $pcontent=$row["description"];
                $arr[]=($pcontent);
                }
            }
            $arr['success'] = 1; 
            echo json_encode($arr);}
?>
