 <?php
        session_start();
        require 'source/GroupOperation.php';
        $username=$_SESSION['UserName'];
        $userid=$_SESSION['UserId'];
        if($userid==null)
            echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=index.html\">";
        else{
        $groupopera=new GroupOperation();
        $groupopera->Init('localhost', 'root', 'root');
            }
        ?>
<?php
                                    $allgrouptopic=$groupopera->getusertopicingroup($userid);
                                    $num=mysql_num_rows($allgrouptopic);
                                    if($num>10)
                                        $total=10;
                                     else
                                        $total=$num;
                                    for($i=0;$i<$total;$i=$i+1){
                                    $rowhere=  mysql_fetch_array($allgrouptopic);
                                    $grouphere=$groupopera->getgroup($rowhere['groupid']);
                                     echo "<tr>";
                                     echo "<td><a href='singletopic.html?topicid=".$rowhere["id"]."'>".$rowhere["name"]."</a></td>";
                                    echo "<td><a href='group.html?groupid=".$grouphere->id."'>".$grouphere->name."</a></td>";
                                    
                                    echo "<td>".$rowhere["replynum"]."</td>";
                                    echo "<td>".$rowhere["updatetime"]."</td>";
                                    echo "</tr>";
                                    }
                                    ?>