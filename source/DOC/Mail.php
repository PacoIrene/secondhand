<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Mail
 *
 * @author chuzhenyang
 */
class Mail {
    //put your code here
    private $id;
    private $sendid;
    private $receiveid;
    private $title;
    private $content;
    private $time;
    private $delete;
    function __construct($sendid,$receiveid,$title,$content,$time,$delete) {
        $this->sendid=$sendid;
        $this->receiveid=$receiveid;
        $this->title=$title;
        $this->time=$time;
        $this->content=$content;
        $this->delete=$delete;
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this->$name=$value;
    }   
}

?>
