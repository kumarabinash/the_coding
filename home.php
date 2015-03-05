
<!DOCTYPE html>
<html>
<head>
	<title>WELCOME</title>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
</head>
<body>
<?php require_once "connection.php"; ?>
<?php include "includes/navbar.php" ?>
<div class="container main">
<section class="row">
	<div class="col-left-1 col-10">
		<h2>Hi, Welcome!</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
	</div>
</section>
</div>
<?php 
if(isset($_GET['login'])){
	if($_GET['login'] == 1){
		echo "
		 	<script>
		 		k$.status({
		 		  text: 'Logged in successfully!',
		 		  type: 'status-green',
		 		  delay: 3000
		 		});
		 	</script>
		 ";
	}
} elseif (isset($_GET['registered'])){
	if($_GET['registered'] == 1){
		echo "
		 	<script>
		 		k$.status({
		 		  text: 'Successfully registered with us!',
		 		  type: 'status-green',
		 		  delay: 3000
		 		});
		 	</script>
		 ";
	}
}

 ?>
</body>
</html>