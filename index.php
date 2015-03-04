<?php
	require "connection.php";
	foreach($row as $value){
		echo $_SESSION['$value'];
	}
?>
