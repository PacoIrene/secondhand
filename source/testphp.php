<?php
 require 'GroupOperation.php';
        $groupopera=new GroupOperation();;
        $groupopera->Init('localhost', 'root', 'root');
                                $decide=$groupopera->isin($userid,$group->id);
                                if($decide)
                                    echo "<button class='btn btn-success' type='button' id='joinGroup'>加入该小组</button>";
                                    else
                                    echo "<button class='btn' type='button' id='exitGroup'>退出小组</button>";
                                  $groupopera->close();
                                ?>