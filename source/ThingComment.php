<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThingComment
 *
 * @author chuzhenyang
 */
class ThingComment {
    //put your code here
    private $id;
    private $time;
    private $content;
    private $userid;
    private $thingid;
    function __construct($time,$content,$userid,$thingid) {
        $this->time=$time;
        $this->content=$content;
        $this->userid=$userid;
        $this->thingid=$thingid;
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this->$name=$value;
    }
}

?>
