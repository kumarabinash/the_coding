<?php require "connection.php" ?>
<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
</head>
<body>
<a href="home.php"><h2 align="middle">HOME</h2></a>
<?php 
if(isset($_POST['forgot'])){
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$pass1 = $_POST['conf_password'];

	if($pass == $pass1){
	$pass = md5($pass1);
	$query = "UPDATE data SET pass='{$pass}' WHERE email='{$email}' ";
	$result = mysql_query($query);
	if (!$result){
		die('error' . mysql_error());
	}else{
		echo "password successfully changed.";
		?> <a href='login.php'><h2 align="middle">Login</h2></a> <?php
	}
	}else{
		echo "password don't match.";
	}
}
?>
<form method="post" action="forgot.php">
	<table>
		<tr>
			<td><label>Email</label></td>
			<td><input name="email" type="text" placeholder="user@email.com"></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input name="password" type="password" placeholder="****"></td>
		</tr>
		<tr>
			<td><label>Confirm Password</label></td>
			<td><input name="conf_password" type="password" placeholder="****"></td>
		</tr>
		<tr>
			<td></td>
			<td><input name="forgot" type="submit" value="Reset Password"></td>
		</tr>
	</table>
</form>
</body>
</html>