<?php
$num=mysql_num_rows($topicreply);
                        for($i=0;$i<$num;$i+=$i+1){
                        $userhere=$useropera->getuser($topicreply['userid']);
                        echo "<div class='topicInfo-reply-single'><div class='topInfo-Pic'>";
                        echo "<a href='personal.html?userid=".$userhere->id."'><img src='".$userhere->photourl."'></a></div>";
                        echo "<div class='topInfo-content'><div class='topInfo-title'>";
                        echo "<a href='personal.html?userid=".$userhere->id."'>".$userhere->name."</a>";
                        echo "<span>(".$topicreply['time'].")</span>";
                        echo "</div><div class='topInfo-info';><p>";
                        echo $topicreply["content"];
                        echo "</p></div></div></div>";
                        }
                        $useropera->close();
                                ?>