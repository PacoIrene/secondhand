<?php
header("Content-type:text/html;charset=utf-8");
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GroupOperation
 *
 * @author chuzhenyang
 */
require 'Group.php';
class GroupOperation {
    //put your code here
    private $conn;
    private $group;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function getgroup($groupid){
        $sql="SELECT * FROM secondhand.group where id='$groupid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $row=mysql_fetch_array($result);
        if($row==null)
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=lose.html\">";
        $this->group=new Group($row["name"],$row["description"],$row["photourl"],$row["class"]);
        $this->group->id=$row["id"];
        return $this->group;
    }
    public function addgroup($group){
        $sql="INSERT INTO secondhand.group(name,description,photourl,class) VALUES('$group->name','$group->description','$group->photourl','$group->class')";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
            $sqll="SELECT id FROM secondhand.group WHERE name='$group->name' AND description='$group->description' AND photourl='$group->photourl' AND class='$group->class'";
            $result=  mysql_query($sqll,$this->conn);
            if(!$result){
                die("Could not query the sql");
            }
            $row=  mysql_fetch_array($result);
            return $row['id'];
        }
    }
    public function isin($userid,$groupid){
        $sql="SELECT * FROM secondhand.usergroup WHERE userid='$userid' AND groupid='$groupid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        $row=  mysql_fetch_array($result);
        if($row==NULL)
            return false;
        else
            return true;
    }
    public function close(){
        mysql_close($this->conn);
    }
}

?>
