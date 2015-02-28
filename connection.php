<?php 
	session_start();
	require "constants.php";
	$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);
	if(!$connection){
		die ('Could not connect to mysql.' . mysql_error());
	} else{
		echo "
			<script>
				k$.growl({
				  text: 'Successfully Connected to Database!',
				  delay: 2000,
				  type: 'alert-warn'
				});
			</script>

		";
	}

	$db = mysql_select_db(DB_NAME, $connection);
	if(!$db){
		die ('Could not select DB.' . mysql_error());
	} else{
		echo "
		<script>
			k$.growl({
			  text: 'Successfully Selected Database!',
			  delay: 2000,
			  type: 'alert-success'
			});
		</script>
		";
	}
?>