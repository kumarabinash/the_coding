<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
</head>
<body>
<?php require "connection.php" ?>
<?php include "includes/navbar.php" ?>
<div class="container main">
<section class="row">
	<div class="col-left-1 col-10">
	<?php
		if(isset($_POST['signup'])){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$mobno = $_POST['mobno'];
			$pass = $_POST['password'];
			$pass1 = $_POST['conf_password'];
			
			$check = "SELECT id FROM data WHERE email='{$email}' ";
			$resultcheck = mysql_query($check);

			if($resultcheck){
				if(mysql_num_rows($resultcheck) == 1){
					echo "email='{$email}'" . " alredy registered with us, please login to continue.";
					// 	HOW TO SHOW MESSAGES IN home.php AFTER SIGNING IN. I CAN CHANGE THE "Location: login.php" BUT HOW TO REDIRECT TO HOME.PHP AND SHOW THINGS
					// UNABLE TO UNDERSTAND FROM foodx
					// header("Location:home.php?registered=1&email='{$email}'");

				}else{
					if($pass == $pass1){
						$pass = md5($pass1);
						$query = "INSERT INTO data(name, email, mobno, pass)VALUES('{$name}', '{$email}', '{$mobno}', '{$pass}')";
						$result = mysql_query($query);
						if(!$result){
							die ('Could not inserted to table.' . mysql_error());
						}else{
							$signin = "SELECT*FROM data WHERE email='{$email}'";
							$resultsignin = mysql_query($signin);
							if($resultsignin){
								$record = mysql_fetch_assoc($resultsignin);
								$_SESSION['userid'] = $record['id'];
								$_SESSION['username'] = $record['name'];
								$_SESSION['useremail'] = $record['email'];
								$_SESSION['usermobno'] = $record['mobno'];
								header("Location:home.php?registered=1");
							}
						}
					} else {
						echo "
							<script>
								k$.status({
								  text: 'Both Passwords doesnt match!',
								  type: 'status-red',
								  delay: 3000
								});
							</script>

						";
					}
				}
			}
		}
	?>
	<h2>Signup</h2>
	<par>Don't have an account. Create it in just few steps.</par>
	<p></p>
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
				<td><input class="button button-green" name="signup" type="submit" value="Signup"></td>
			</tr>
		</table>
	</form>
	</div>
	</section>
</div>
</body>
</html>