<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Topic
 *
 * @author chuzhenyang
 */
class Topic {
    //put your code here
    private $id;
    private $name;
    private $content;
    private $time;
    private $replynum;
    private $userid;
    private $groupid;
    function __construct($name,$content,$time,$replynum,$userid,$groupid) {
        $this->name=$name;
        $this->content=$content;
        $this->time=$time;
        $this->replynum=$replynum;
        $this->userid=$userid;
        $this->groupid=$groupid;
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this-$name=$value;
    }
}

?>
