<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
unset($_SESSION['UserName']);
unset($_SESSION['UserId']);
echo "<META HTTP-EQUIV=\"Refresh\" CONTENT=\"0;URL=../index.html\">";
exit();
?>
