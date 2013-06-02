<?php
require 'GroupOperation.php';
        $groupopera=new GroupOperation();
        $groupopera->Init('localhost', 'root', 'root');
$usersgroup=$groupopera->getusersgroup(3);
                        $num=mysql_num_rows($usersgroup);
                        if($num>10)
                                        $total=10;
                                     else
                                        $total=$num;

                        for($i=0;$i<$total;$i=$i+1){
                                    $rowhere=  mysql_fetch_array($usersgroup);
                                    $grouphere=$groupopera->getgroup($rowhere['groupid']);
                                    echo "<dl class='groupList-li'><dt>";
                                    echo "<a href='group.html?groupid=".$grouphere->id."'><img src='".$grouphere->photourl."' class='img-rounded'></a></dt><dd>";
                                    echo "<a href='group.html?groupid=".$grouphere->id."'>".$grouphere->name."</a></dd></dl>";
                                    }
                                ?>