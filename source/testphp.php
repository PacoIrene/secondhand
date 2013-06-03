<?php
    session_start();
        require 'source/UserOperation.php';
        $username=$_SESSION['UserName'];
        $userid=$_SESSION['UserId'];
        $groupclass=$_GET['class'];
        $thingid=$_GET['thingid'];
       require 'source/ThingOperation.php';
        if($userid==null)
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.html\">";
        else{
        if($thingid==null)
         echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=lose.html\">";
        else{
         if($groupclass==null)
                $groupclass=0;
             elseif ($groupclass=='1')
                $groupclass=1;
                else $groupclass=0;
        }
        
            }
         $tcopera=new ThingCommentOperation();
        $tcopera->Init('localhost', 'root', 'root');
                                ?>