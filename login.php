<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
</head>
<body>
<?php require "connection.php" ?>
<div class="container">
	<h2>Login</h2>
	<a href="home.php"><h2 align="middle">HOME</h2></a>
	<?php 
	if(isset($_POST['login'])){
		$email = $_POST['email'];
		$pass = md5($_POST['password']);

		$check = "SELECT id FROM data WHERE email='{$email}' ";
		$resultcheck = mysql_query($check);

		if($resultcheck){
			if(mysql_num_rows($resultcheck) == 1){
				$query = "SELECT * FROM data WHERE email = '{$email}' AND pass = '{$pass}' ";
				$result = mysql_query($query);
				if(!mysql_num_rows($result) == 1){
					// header("Location:login.php");
					// http_redirect('login.php');
					die ('Password do not match!!' . mysql_error());
				}else{
					$row = mysql_fetch_assoc($result);
					// session_start();
					$_SESSION['userid'] = $row['id'];
					$_SESSION['username'] = $row['name'];
					$_SESSION['useremail'] = $row['email'];
					$_SESSION['usermobno'] = $row['mobno'];
					$_SESSION['msg'] = "message"; //testing
					// header("Location:index.php?login=1"); //	WHAT DO YOU MEAN BY ?login=1 ?
					echo "
						<script>
							k$.growl({
							  text: 'Logged in Successfully!',
							  type: 'status-green',
							  delay: 3000
							});
						</script>

					";
					echo "Hello " . $row['name'] ." :: ". "{$_SESSION['useremail']}" ." ::  ". $row['mobno'];
					?><a href="logout.php"><h2 align="middle">Logout</h2></a><?php
				}
			}else{
				echo "
				<script>
					k$.status({
					  text: 'You are not registered with us! Please Register!',
					  type: 'status-red',
					  delay: 3000
					});
				</script>

				";
			}
		}	
	}
	?>
	<form method='post' action='login.php'>
		<table>
			<tr>
				<td><label>Email</label></td>
				<td><input name='email' type='text' placeholder='user@email.com'></td>
			</tr>
			<tr>
				<td><label>Password</label></td>
				<td><input name='password' type='password' placeholder = '****'></td>
			</tr>
			<tr>
				<td></td>
				<td><input class="button button-blue" name='login' type='submit' value='Login'></td>
			</tr>
			<tr>
				<td></td>
				<td><a href="forgot.php">Forgot Password! Click here.</a></td>
			</tr>
		</table>
	</form>
</div>
</body>
</html>