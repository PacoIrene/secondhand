<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Thing
 *
 * @author chuzhenyang
 */
class Thing {
    //put your code here
    private $id;
    private $name;
    private $class;
    private $description;
    private $photourl;
    function __construct($name,$class,$description,$photourl) {
        $this->name=$name;
        $this->class=$class;
        $this->description=$description;
        $this->photourl=$photourl;
    }
    public function __get($name) {
        return $this->$name;
    }
    public function __set($name, $value) {
        $this->$name=$value;
    }
}

?>
