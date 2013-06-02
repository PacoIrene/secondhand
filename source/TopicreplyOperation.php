<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TopicreplyOperation
 *
 * @author chuzhenyang
 */
class TopicreplyOperation {
    //put your code here
    private $conn;
    private $topicreplyall;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function getallreply($topicid){
        $sql="SELECT * FROM secondhand.topicreply WHERE topicid='$topicid'";
        $this->topicreplyall=  mysql_query($sql, $this->conn);
        if(!$this->topicreplyall){
            die('Could not query the sql');
        }
        return $this->topicreplyall;
    }
     public function close(){
        mysql_close($this->conn);
    }
}
?>
