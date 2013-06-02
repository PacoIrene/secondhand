<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author chuzhenyang
 */
class User {
    //put your code here
    private $id;
    private $name;
    private $email;
    private $password;
    private $photourl;
    function __construct($name,$email,$password,$photourl){
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
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
