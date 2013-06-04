<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ThingOperation
 *
 * @author chuzhenyang
 */
require 'Thing.php';
class ThingOperation {
    //put your code here
    private $conn;
    private $thing;
    public function Init($dbhost, $dbuser, $dbpass){
         $this->conn = mysql_connect($dbhost, $dbuser, $dbpass);
        if (!$this->conn) {
            die('Could not connect to mysql');
        }
        mysql_select_db("secondhand", $this->conn);
    }
    public function addthing($thing){
        $sql="INSERT INTO secondhand.thing(name,class,description,photourl) VALUES('$thing->name','$thing->class','$thing->description','$thing->photourl')";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        else{
             $sqll="SELECT id FROM secondhand.thing ORDER BY id DESC";
            $result1=  mysql_query($sqll,$this->conn);
            if(!$result1){
                die("Could not query the sql");
            }
            $row=  mysql_fetch_array($result1);
            return $row['id'];
        }
    }
 public function getthing($thingid){
        $sql="SELECT * FROM secondhand.thing where id='$thingid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $row=mysql_fetch_array($result);
        if($row==null)
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=lose.html\">";
        $this->thing=new Thing($row["name"],$row["class"],$row["description"],$row["photourl"]);
        $this->thing->id=$thingid;
        return $this->thing;
    }
     //分类获得东西
    public function getthingbyclass($class){
        if($class==0)
             $sql="SELECT * FROM secondhand.thing";
        else
            $sql="SELECT * FROM secondhand.thing WHERE class='$class'";
         $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }
    public function isinbuy($userid,$thingid){
         $sql="SELECT * FROM secondhand.buything WHERE userid='$userid' AND thingid='$thingid'";
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
    public function isinsell($userid,$thingid){
        $sql="SELECT * FROM secondhand.sellthing WHERE userid='$userid' AND thingid='$thingid'";
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
    public function getallbuyuser($thingid){
        $sql="SELECT * FROM secondhand.buything WHERE thingid='$thingid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    public function getallselluser($thingid){
        $sql="SELECT * FROM secondhand.sellthing WHERE thingid='$thingid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    public function getuserbuything($userid){
        $sql="SELECT thingid FROM secondhand.buything WHERE userid='$userid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    public function getusersellthing($userid){
        $sql="SELECT thingid FROM secondhand.sellthing WHERE userid='$userid'";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    public function getuserbuythinglimit($userid){
        $sql="SELECT thingid FROM secondhand.buything WHERE userid='$userid' LIMIT 0,5 ";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
    public function getusersellthinglimit($userid){
        $sql="SELECT thingid FROM secondhand.sellthing WHERE userid='$userid' LIMIT 0,5";
        $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
        return $result;
    }
      public function searchthing($value){
          $sql="SELECT * FROM secondhand.thing WHERE name like '%$value%'";
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
