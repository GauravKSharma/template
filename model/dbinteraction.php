<?php
$host = "localhost";
$user = "root";
$pass = "";

$databaseName = "template_engine";
$tableName = "variables";

$con = mysql_connect($host,$user,$pass) or die(mysql_error());
$dbs = mysql_select_db($databaseName, $con) or die(mysql_error());
?>