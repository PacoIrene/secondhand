<?php
$allgrouptopic=$groupopera->getalltopicforgroup($groupid);
                                    $num=mysql_num_rows($allgrouptopic);
                                    for($i=0;$i<$num;$i=$i+1){
                                    $rowhere=  mysql_fetch_array($allgrouptopic);
                                    $userhere=$useropera->getuser($rowhere['userid']);
                                    echo "<tr>";
                                    echo "<a href='personal.html?userid=".$userhere->id."'>".$userhere->name."</a>";
                                    echo "<a href='topic.html?topicid=".$rowhere->id."'>".$rowhere->name."</a>";
                                    echo "<td>".$rowhere["replynum"]."</td>";
                                    echo "<td>".$rowhere["updatetime"]."</td>";
                                    echo "</tr>";
                                    }
                                    $groupopera->close();
                                    $useropera->close();
                                ?>