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
$sql="SELECT * FROM secondhand.usergroup WHERE userid='$u' LIMIT $pnum,10 ";
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
                $arr[]=($row["groupid"]);
                $grouphere=$groupopera->getgroup($row['groupid']); 
                $arr[]=($grouphere->photourl);
                $arr[]=($row["groupid"]);
                $length=strlen($grouphere->name);
                                    if($length>9)
                                        $pcontent=substr($grouphere->name,0,9)."...";
                                    else
                                        $pcontent=$grouphere->name;
                $arr[]=($pcontent);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
            $groupopera->close();
        }
?>
