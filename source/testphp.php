<?php
  $groupopera=new GroupOperation();
                        $groupopera->Init('localhost', 'root', 'root');
                        $result=$groupopera->getgroupbyclass($groupclass);
                        $num=mysql_num_rows($result);
                          if($num>10)
                                        $total=10;
                                     else
                                        $total=$num;
                                    for($i=0;$i<$total;$i=$i+1){
                                    $rowhere=  mysql_fetch_array($result);
                                    echo "<div class='result'><div class='resultPic'>";
                                    echo "<a href='".$rowhere["id"]."'><img src='".$rowhere["photourl"]."'></a>";
                                    echo "</div><div class='resultContent'><div class='resultTitle'>";
                                    echo "<h3><a href='".$rowhere["id"]."'>".$rowhere["name"]."</a></h3>";
                                    echo "</div><div class='resultInfo'><p>";
                                    $length=strlen($rowhere["description"]);
                                    if($length>10)
                                        $pcontent=substr($rowhere["description"],0,10);
                                    else
                                        $pcontent=$rowhere["description"];
                                    echo $pcontent;
                                    echo "</p></div><div class='resultJoin'>";
                                    echo "<a href='#' name='".$rowhere["id"]."'>+ 加入小组</a>";
                                    echo "</div></div></div>";
                                    }
                                ?>