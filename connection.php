<?php 
	session_start();
	require "constants.php";
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if(!$connection){
		die ('Could not connect to mysql.' . mysql_error());
	}

	$db = mysql_select_db(DB_NAME, $connection);
	if(!$db){
		die ('Could not select DB.' . mysql_error());
	}
?>