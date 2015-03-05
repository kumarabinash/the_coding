<!DOCTYPE html>
<html>
<head>
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="dist/css/style.css">
	<link rel="stylesheet" type="text/css" href="dist/css/kickstart.css">
	<script type="text/javascript" src="dist/js/kickstart.js"></script>
</head>
<body>
<?php require_once "connection.php"; ?>
<?php include "includes/navbar.php"; ?>
	<div class="container main">
		<section class="row">
			<div class="col-left-1 col-10">
				<?php 
					if(isset($_POST['forgot'])){
						$email = $_POST['email'];
						$pass = $_POST['password'];
						$pass1 = $_POST['conf_password'];

						$check = "SELECT id FROM data WHERE email='{$email}' ";
						$resultcheck = mysql_query($check);
						if($resultcheck){
							if(mysql_num_rows($resultcheck) == 1){

								if($pass == $pass1){
									$pass = md5($pass1);
									$query = "UPDATE data SET pass='{$pass}' WHERE email='{$email}' ";
									$result = mysql_query($query);
									
									if (!$result){
											die('error' . mysql_error());
									}else{
											echo "password successfully changed.";
									}
								}else{
									echo "password don't match.";
								}
							}else{
								echo "
									<script>
										k$.growl({
											text: 'Enter your registered email correctly.',
											type: 'status-red',
											delay: 7000
										});
									</script>
								";
							}
						}
					}
				?>
				<h2>Forgot Password</h2>
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
							<td style="color:black"><input name="forgot" type="submit" value="Reset Password"></td>
						</tr>
					</table>
				</form>
			</div>
		</section>
	</div>
</body>
</html>