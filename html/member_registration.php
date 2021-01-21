<!DOCTYPE html>
<html lang="en-au">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
    <title>Member registration</title>
</head>
<body>
    <header>
	<?php 
		include 'include_files/Navigation.inc';
		include 'include_files/Banner.inc';
		include 'include_files/member_signup.php';
		error_reporting(0);
			?>
     </header>
			 <p><h1>Member Registration</h1></p>
	<p>Register your details below to be added to our member database</p>
	<div class="form-container">
        <form action="../php/include_files/Sign_up.php" method="post" class="sign-up-form">
			<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" value="<?php echo $_SESSION['firstName']?>" required>
			<br>
			<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder=" Last name" value="<?php echo $_SESSION['lastName']?>" required>
			<br>
			<label for "email">Email</label><input type="text" name= "email" placeholder="Email" value="<?php echo $_SESSION['email']?>" required>
			<br>
			<label for "Username">Username</label><input type="text" name= "Username" placeholder="Username" value="<?php echo $_SESSION['Username']?>" required>
			<br>
			<label for "pwd">Password</label><input type="password" name= "pwd" placeholder="Password" minlength="6" required>
			<br>
			<label for "pwdrepeat">Repeat Password</label><input type= "password" name="pwdRepeat" placeholder="Repeat Password" required>
			<br>
			<button type="submit" name="reg_user">Register details</button>
			<button type="reset" name="cancel">Cancel registration</button>
	</form>
	</div>
		<?php 		
		if(!isset($_GET['signup'])) {
			exit();
		} else {
			$signupCheck = $_GET['signup'];
			
			if($signupCheck == "char") {
			echo '<p class="error">Please only user letters in your first and last name</p>';
			exit(); 
			} elseif($signupCheck == "email") {
			echo '<p class="error">Invalid email</p>';
			exit(); 
		} elseif($signupCheck == "charusername") {
			echo '<p class="error">Username cannot contain that symbol</p>';
			exit(); 
			} elseif($signupCheck == "Passworddontmatch") {
			echo '<p class="error">Password does not match</p>';
			exit(); 
			} elseif($signupCheck == "success") {
				echo "success";
				exit();
			}
		} 
		?>
</body>
</html>
