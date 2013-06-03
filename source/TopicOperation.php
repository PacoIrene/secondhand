<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TopicOperation
 *
 * @author chuzhenyang
 */
require 'Topic.php';
require 'GroupOperation.php';
class TopicOperation {
    //put your code here
    private $conn;
    private $topic;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function gettopic($topicid){
        $sql="SELECT * FROM secondhand.topic WHERE id='$topicid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $row=mysql_fetch_array($result);
        $this->topic=new Topic($row["name"],$row["content"],$row["time"],$row["replynum"],$row["userid"],$row["groupid"],$row["updatetime"]);
        return $this->topic;
    }

    public function getingroup($topicid){
        $sql="SELECT groupid FROM secondhand.topic WHERE id='$topicid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        $row=  mysql_fetch_array($result);
        $groupid=$row['groupid'];
        $groupopera=new GroupOperation();
        $groupopera->Init('localhost', 'root', 'root');
        $group=$groupopera->getgroup($groupid);
        $groupopera->close();
        return $group;
    }

    public function addtopic($topic){
        $sql="INSERT INTO secondhand.topic(name,content,time,replynum,userid,groupid,updatetime) VALUES('$topic->name','$topic->content','$topic->time','$topic->replynum','$topic->userid','$topic->groupid','$topic->updatetime')";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
            $sqll="SELECT id FROM secondhand.topic WHERE name='$topic->name'AND content='$topic->content' AND time='$topic->time' AND replynum='$topic->replynum' AND userid='$topic->userid' AND groupid='$topic->groupid'";
            $result=  mysql_query($sqll,$this->conn);
            if(!$result){
                die("Could not query the sql");
            }
            $row=  mysql_fetch_array($result);
            return $row['id'];
        }
    }
    //用户发起的话题
    public function getallusersigntopic($userid){
        $sql="SELECT * FROM secondhand.topic WHERE userid='$userid' ORDER BY updatetime DESC";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    //用户回复的话题
    public function getalluserreplytopic($userid){
        $sql="SELECT topicid FROM secondhand.topicreply WHERE userid='$userid'";
        $result=  mysql_query($sql, $this->conn);
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
         $sql1="SELECT * FROM secondhand.topic WHERE id IN ('$text') ORDER BY updatetime DESC";
         $result1=  mysql_query($sql1, $this->conn);
        if(!$result1){
            die('Could not query the sql');
        }
    return $result1;
    }
    public function isin($userid,$topicid){
        $sql="SELECT groupid FROM secondhand.topic WHERE id='$topicid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        $row=  mysql_fetch_array($result);
        $groupid=$row['groupid'];
 
        $groupopera=new GroupOperation();
        $groupopera->Init('localhost', 'root', 'root');
        $deicde=$groupopera->isin($userid, $groupid);
        if(!$deicde)
            return false;
        else
            return true;
    }
     public function close(){
        mysql_close($this->conn);
    }
}
?>
