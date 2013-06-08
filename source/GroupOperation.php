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
        $this->group=new Group($row["name"],$row["description"],$row["photourl"],$row["class"],$row["usernum"]);
        $this->group->id=$groupid;
        return $this->group;
    }
    public function getusersgroup($userid){
        $sql="SELECT groupid FROM secondhand.usergroup WHERE userid='$userid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }
    //用户所有的话题，也就是说那个我的小组点击后的结果
    public function getusertopicingroup($userid){
        $sql="SELECT groupid FROM secondhand.usergroup WHERE userid='$userid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        $chars=array();
        $num=  mysql_num_rows($result);
        for($i=0;$i!=$num;$i++)
        {
            $row=  mysql_fetch_array($result);
            $chars[]=$row["groupid"];
        }
        foreach($chars as $color)  
        {  
            $text=$text."'".(string)$color."',";
        }  
        $lenght=strlen($text);
        $text=substr($text,1,$lenght-3);
        $sql1="SELECT * FROM secondhand.topic WHERE groupid IN ('$text') ORDER BY updatetime DESC";
        $result1=  mysql_query($sql1, $this->conn);
        if(!$result1){
            die('Could not query the sql');
        }
        return $result1;
    }
    //小组的全部话题
    public function getalltopicforgroup($groupid){
        $sql="SELECT * FROM secondhand.topic WHERE groupid='$groupid' ORDER BY updatetime DESC";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }
    //分类获得小组
    public function getgroupbyclass($class){
        if($class==0)
             $sql="SELECT * FROM secondhand.group ORDER BY usernum DESC";
        else
            $sql="SELECT * FROM secondhand.group WHERE class='$class' ORDER BY usernum DESC";
         $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }

    public function getalluseringroup($groupid){
        $sql="SELECT userid FROM secondhand.usergroup WHERE groupid='$groupid'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }
    public function getallgroupforuserlimit($userid){
        $sql="SELECT groupid FROM secondhand.usergroup WHERE userid='$userid' LIMIT 0,9";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
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
    public function searchgroup($value){
          $sql="SELECT * FROM secondhand.group WHERE name like '%$value%'";
        $result=  mysql_query($sql, $this->conn);
        if(!$result){
            die('Could not query the sql');
        }
        return $result;
    }
 public function updatepicforuser($groupid,$path){
        $sql="UPDATE secondhand.group SET photourl='$path' WHERE id='$groupid'";
         $result=  mysql_query($sql,$this->conn);
        if(!$result){
            die("Could not query the sql");
        }
    }
    public function close(){
        mysql_close($this->conn);
    }
}
           
?>
