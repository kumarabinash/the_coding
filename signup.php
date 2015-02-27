<?php require 'connection.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
</head>
<body>
<a href="home.php"><h2 align="middle">HOME</h2></a>
<?php 
	if(isset($_POST['signup'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$mobno = $_POST['mobno'];
		$pass = $_POST['password'];
		$pass1 = $_POST['conf_password'];
		
		if($pass == $pass1){
			$pass = md5($pass1);
			$query = "INSERT INTO data(name, email, mobno, pass)VALUES('{$name}', '{$email}', '{$mobno}', '{$pass}')";
			$result = mysql_query($query);
			if(!$result){
				die ('Could not inserted to table.' . mysql_error());
			} else{
				echo "inserted to table.";
				?> <a href='login.php'><h2 align="middle">Login</h2></a> <?php
			}
		}else{
			echo "password don't match.";
		}
	}
?>
<h2>Signup</h2>
<p>Don't have a account. Create it in just few steps.</p>
<form method="post" action="signup.php">
	<table>
		<tr>
			<td><label>Name</label></td>
			<td><input name="name" type="text" placeholder="E.g Rajesh Patra"></td>
		</tr>
		<tr>
			<td><label>Email</label></td>
			<td><input name="email" type="text" placeholder="user@email.com"></td>
		</tr>
		<tr>
			<td><label>Mobile No</label></td>
			<td><input name="mobno" type="text" placeholder="0987654321"></td>
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
			<td><input name="signup" type="submit" value="Signup"></td>
		</tr>
	</table>
</form>
</body>
</html>