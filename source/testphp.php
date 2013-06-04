<?php
                        $useropera=new UserOperation();
                        $useropera->Init('localhost', 'root', 'root');
                        $result=$useropera->searchuser($searchvalue);
                        $num=mysql_num_rows($result);
                                    if($num>10)
                                        $total=10;
                                     else
                                        $total=$num;
                                    for($i=0;$i<$total;$i=$i+1){
                                    $rowhere=  mysql_fetch_array($result);
                                   echo "<div class='result'><div class='resultPic'>";
                                    echo "<a href=personal.html?userid=".$rowhere["id"]."><img src='".$rowhere["photourl"]."'></a>";
                                    echo "</div><div class='resultContent'><div class='resultTitle'>";
                                    echo "<h3><a href=personal.html?userid=".$rowhere["id"].">".$rowhere["name"]."</a></h3>";
                                    echo "</div><div class='resultInfo'><p>";
                                    echo "</p></div>";
                                    echo "</div></div>";}
                        ?>