<?php
####### Connection to DataBase
	$host = "localhost";
	$user = "root";
	$passwd = "";
	$db = "carmngt";
	if(!$con = mysql_connect($host,$user,$passwd))	die("<b style=\"color:red;\">Error: DB Connect failed</b>");
	if(!mysql_select_db($db,$con)) die("<b style=\"color:red;\">Error: Db Select Error</b>");
?>
