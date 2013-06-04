<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UserOperation
 *
 * @author chuzhenyang
 */
require 'User.php';
class UserOperation {
    //put your code here
    private $conn;
    private $user;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function getuser($userid){
        $sql="SELECT * FROM user WHERE id='$userid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $row=mysql_fetch_array($result);
        $this->user=new User($row["name"],$row["email"],$row["password"],$row["photourl"]);
        $this->user->id=$row["id"];
        return $this->user;
    }
    public function adduser($user){
        $sql="INSERT INTO user(name,email,password,photourl) VALUES('$user->name','$user->email','$user->password','$user->photourl')";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
    }
    public function finduser($username,$password){
        $sql="SELECT * FROM user WHERE email='$username' And password='$password'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $row=mysql_num_rows($result);
        $chess=  mysql_fetch_array($result);
        if($row==0){
            return false;
        }
        else if($row==1){
            return $chess;
        }
        else{
            return false;
        }
    }
    public function updateuser($userid,$name,$password,$photourl){
        $sql="UPDATE secondhand.user SET name='$name',password='$password',photourl='$photourl' WHERE id='$userid'";
         $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
    }
    public function searchuser($value){
        $sql="SELECT * FROM secondhand.user WHERE name like '%$value%'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }

    public function close(){
         mysql_close($this->conn);
    }
}
?>
