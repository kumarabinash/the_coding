<?php require 'connection.php' ?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
</head>
<body>
<h2>Login</h2>
<a href="home.php"><h2 align="middle">HOME</h2></a>
<?php 
if(isset($_POST['login'])){
	$email = $_POST['email'];
	$pass = md5($_POST['password']);

	$query = "SELECT * FROM data WHERE email = '{$email}' AND pass = '{$pass}' ";
	$result = mysql_query($query);
	if(!$result){
		die ('username or password do not match!!' . mysql_error());
	}else{
		$row = mysql_fetch_assoc($result);
		echo "Hello " . $row['name'];
		?><a href="logout.php"><h2 align="middle">Logout</h2></a><?php
	}
}
?>
<form method='post' action='login.php'>
	<table>
		<tr>
			<td><label>Email</label></td>
			<td><input name = 'email' type= 'text' placeholder='user@email.com'></td>
		</tr>
		<tr>
			<td><label>Password</label></td>
			<td><input name= 'password' type = 'password' placeholder = '****'></td>
		</tr>
		<tr>
			<td></td>
			<td><input name = 'login' type = 'submit' value = 'Login'></td>
		</tr>
		<tr>
			<td></td>
			<td><a href="forgot.php">Forgot Password! Click here.</a></td>
		</tr>
	</table>
</form>
</body>
</html>