<?php
$localhost = "localhost";
$dbuser = "root";
$dbpass = "root";
$dbname = "rejestarcja";

$connect = mysql_connect($localhost, $dbuser, $dbpass);
mysql_select_db("$dbname", $connect);


?>
