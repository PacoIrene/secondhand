<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
header("Content-type:text/html;charset=utf-8");
require 'ThingOperation.php';
$p=$_POST["p"];
$c=$_POST["c"];
$u=$_POST["u"];
$pnum=$p*10;
if($c==0)
    $sql="SELECT thingid FROM secondhand.buything WHERE userid='$u' LIMIT $pnum,10";
else
    $sql="SELECT thingid FROM secondhand.sellthing WHERE userid='$u' LIMIT $pnum,10";
$conn = mysql_connect("localhost","root","root");
$result=  mysql_query($sql, $conn);
        if(!$result){
            die('Could not query the sql');
        }
        else{
             $thingopera=new ThingOperation();
             $thingopera->Init('localhost', 'root', 'root');
            $num =  mysql_num_rows ($result);
            $topic=array();
            for($i=0;$i<$num;$i=$i+1){
                $row=mysql_fetch_array($result);
                $thinghere=$thingopera->getthing($row["thingid"]);
                $arr[]=($row["thingid"]);
                $arr[]=($thinghere->photourl);
                $arr[]=($row["thingid"]);
                $arr[]=($thinghere->name);
                $length=strlen($thinghere->description);
                                    if($length>60)
                                        $pcontent=substr($thinghere->description,0,60)."...";
                                    else
                                        $pcontent=$thinghere->description;
                $arr[]=($pcontent);
            }
            $arr['success'] = 1; 
            echo json_encode($arr);
            $thingopera->close();
        }
?>
