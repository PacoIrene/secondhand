<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TopicReply
 *
 * @author chuzhenyang
 */
class TopicReply {
    //put your code here
    private $id;
    private $content;
    private $time;
    private $userid;
    private $topicid;
    function __construct($content,$time,$userid,$topicid) {
        $this->content=$content;
        $this->time=$time;
        $this->userid=$userid;
        $this->topicid=$topicid;
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this->$name=$value;
    }
}

?>
