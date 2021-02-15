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
		include 'include_files/navigation.inc.php';
		include 'include_files/banner.inc.php';
		include 'include_files/member_registration_functions.inc.php';
		include 'include_files/welcome_message.inc.php';
			?>
     </header>
			 <p><h1>Member Registration</h1></p>
	<p class="form-text">Register your details below to be added to our Member Database. <br><br> Please note that you will first need to be registered on our Customer Databased in order to register on our Member Database</p>
	<div class="form-container">
        <form action="include_files/member_registration_functions.inc.php" method="post" class="sign-up-form">
			<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" required>
			<br>
			<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder=" Last name" required>
			<br>
			<label for "email">Email</label><input type="text" name= "email" placeholder="Email" required>
			<br>
			<label for "Username">Username</label><input type="text" name= "Username" placeholder="Username" required>
			<br>
			<label for "pwd">Password</label><input type="password" name= "pwd" placeholder="Password" minlength="6" required>
			<br>
			<label for "pwdrepeat">Repeat Password</label><input type= "password" name="pwdRepeat" placeholder="Repeat Password" required>
			<br>
			</div>
		<div class="login-container">
			<button type="submit" name="reg_user" class="registration-button">Register details</button>
			<button type="reset" name="cancel" class="registration-button">Cancel registration</button>
		</div>
	</form>
		<?php 		
		if(!isset($_GET['signup'])) { //checks if the query string key exists
			exit();
		} else {
			$signupCheck = $_GET['signup'];
			
			if($signupCheck == "customerregistration") {
				echo "<script language='Javascript'>alert('You have successfullly registered as a Customer. Please register as a Member to access the Members Page.');</script>"; //displays a message if the user has registered as a customer
				exit();
			}elseif($signupCheck == "char") { //error messages 
			echo '<p class="error">Please only user letters in your first and last name</p>'; 
			exit(); 
			} elseif($signupCheck == "email") {
			echo '<p class="error">Invalid email</p>';
			exit(); 
		} elseif($signupCheck == "charusername") {
			echo '<p class="error">Username cannot contain that symbol</p>';
			exit(); 
			} elseif($signupCheck == "charpwd") {
			echo '<p class="error">Your password can only contain letters, numbers, full stop or forward slash</p>';
			exit(); 
			} elseif($signupCheck == "Passworddontmatch") {
			echo '<p class="error">Password does not match</p>';
			exit(); 
			} 
		}
		?>
</body>
</html>