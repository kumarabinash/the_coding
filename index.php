<?php
	require "connection.php";
	// HOW TO SHOW ALL DETAILS ABOUT THE LOGGED IN
	foreach($row as $value){
		echo $_SESSION['$value'];
	}
?>
