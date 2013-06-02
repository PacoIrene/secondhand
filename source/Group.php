<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Group
 *
 * @author chuzhenyang
 */
class Group {
    //put your code here
    public $id;
    private $name;
    private $description;
    private $photourl;
    private $class;
    function __construct($name,$description,$photourl,$class){
        $this->name=$name;
        $this->description=$description;
        $this->photourl=$photourl;
        $this->class=$class;
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this->$name=$value;
    }
}

?>
