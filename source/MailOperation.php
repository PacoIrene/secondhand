<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MailOperation
 *
 * @author chuzhenyang
 */
require 'Mail.php';
class MailOperation {
    //put your code here
    private $conn;
    private $mail;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function addmail($mail){
        $sql="INSERT INTO secondhand.mail(sendid,receiveid,title,content,time) VALUES('$mail->sendid','$mail->receiveid','$mail->title','$mail->content','$mail->time')";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
             $sqll="SELECT id FROM secondhand.mail ORDER BY id DESC";
            $result1=  mysql_query($sqll,$this->conn);
            if(!$result1){
                die("Could not query the sql");
            }
            $row=  mysql_fetch_array($result1);
            return $row['id'];
        }
    }
    public function getgetmail($userid){
        $sql="SELECT * FROM secondhand.mail WHERE receiveid='$userid' AND deleted IN(0,1) ORDER BY time DESC";
         $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    public function getsinglemail($mailid){
          $sql="SELECT * FROM secondhand.mail where id='$mailid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $row=mysql_fetch_array($result);
        if($row==null)
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=lose.html\">";
        $this->mail=new Mail($row["sendid"],$row["receiveid"],$row["title"],$row["content"],$row["time"],$row["deleted"]);
        $this->mail->id=$mailid;
        return $this->mail;
    }
    public function issender($mailid,$userid){
        $sql="SELECT * FROM secondhand.mail WHERE sendid='$userid' AND id='$mailid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        $row=  mysql_fetch_array($result);
        if($row==NULL)
            return false;
        else
            return true;
    }
    public function isreceived($mailid,$userid){
        $sql="SELECT * FROM secondhand.mail WHERE receiveid='$userid' AND id='$mailid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        $row=  mysql_fetch_array($result);
        if($row==NULL)
            return false;
        else
            return true;
    }

    public function getsendmail($userid){
        $sql="SELECT * FROM secondhand.mail WHERE sendid='$userid' AND deleted IN(0,2) ORDER BY time DESC";
         $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }

    public function close(){
        mysql_close($this->conn);
    }
}

?>
