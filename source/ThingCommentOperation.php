<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThingCommentOperation
 *
 * @author chuzhenyang
 */
require 'ThingComment.php';
class ThingCommentOperation {
    //put your code here
    private $conn;
    private $thingcommentall;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function getallcomment($thingid){
        $sql="SELECT * FROM secondhand.thingcomment WHERE thingid='$thingid' ORDER BY time DESC";
        $this->thingcommentall=  mysql_query($sql, $this->conn);
        if(!$this->thingcommentall){
            die('Could not query the sql');
        }
        return $this->thingcommentall;
    }
     public function close(){
        mysql_close($this->conn);
    }
}

?>
