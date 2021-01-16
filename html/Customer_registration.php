<!DOCTYPE html>
<?php session_start() ?>
<html lang="en-au">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet"  type='text/css' href="../styles/remaining_pages.css">
    <title>Customer registration</title>
</head>
<body>
    <header>
	<?php 
		include 'include_files/Navigation.inc';
		include 'include_files/Banner.inc';
		include 'include_files/Sign_up.php';
			?>
     </header>
			 <p><h1>Customer Registration</h1></p>
	<p>Register your details below to be added to our customer database</p>
	<div class="signup-form-form">
        <form action="include_files/Sign_up.php" method="post" class="sign-up-form">
			<?php /*
			if(isset($_GET['firstName'])) {
				$firstName = $_GET['firstName'];
				echo '<label for "firstName">First name</label><input type="text" name= "lastName" placeholder="Last name" value="'.$firstName.'" required>';
			}
			else {
				echo '<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" required>';
			}
			echo '<br>';
			
			if(isset($_GET['lastName'])) {
				$lastName = $_GET['lastName'];
				echo '<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder="Last name" required value="'.$lastName.'" required>';
			}
			else {
				echo '<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder="Last name" required>';
			}
			echo '<br>';
			if(isset($_GET['Username'])) {
				$Username = $_GET['Username'];
				echo '<label for "Username">Username</label><input type="text" name= "Username" placeholder="Username" value="'.$Username.'">';
			}
			else {
				echo '<label for "Username">Username</label><input type="text" name= "Username" placeholder="Username" required>';
			}
			echo '<br>';
			if(isset($_GET['email'])) {
				$email = $_GET['email'];
				echo '<label for "email">Email</label><input type="text" name= "email" placeholder="Email" value="'.$email.'" required>';
			}
			else {
				echo '<label for "email">Email</label><input type="text" name= "email" placeholder="Email" required>';
			}
			echo '<br>';
			if(isset($_GET['pwd'])) {
				$pwd = $_GET['pwd'];
				echo '<label for "pwd">Password</label><input type="password" name= "pwd" placeholder="Password" value="'.$pwd.'" required>';
			}
			else {
				echo '<label for "pwd">Password</label><input type="password" name= "pwd" placeholder="Password" required>';
			}
			echo '<br>';
			if(isset($_GET['pwdRepeat'])) {
				$pwdrepeat = $_GET['pwdRepeat'];
				echo '<label for "pwdrepeat">Repeat Password</label><input type= "password" name="pwdRepeat" placeholder="Repeat Password" value="'.$pwdrepeat.'" required>';
			}
			else {
				echo '<label for "pwdrepeat">Repeat Password</label><input type= "password" name="pwdRepeat" placeholder="Repeat Password" required>';
			}
			echo '<br>';
				<button type="submit" name="reg_user">Register details</button>
			<button type="reset" name="cancel">Cancel</button>
			*/?>
			<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" required>
			<span class= "error"></span>
			<br>
			<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder=" Last name" required>
			<span class= "error"></span>
			<br>
			<label for "email">Email</label><input type="text" name= "email" placeholder="Email" required>
			<span class= "error"></span>
			<br>
			<label for "Username">Username</label><input type="text" name= "Username" placeholder="Username" required>
			<span class= "error"></span>
			<br>
			<label for "pwd">Password</label><input type="password" name= "pwd" placeholder="Password" required>
			<span class= "error"></span>
			<br>
			<label for "pwdrepeat">Repeat Password</label><input type= "password" name="pwdRepeat" placeholder="Repeat Password" required>
			<span class= "error"></span>
			<br>
			<button type="submit" name="reg_user">Register details</button>
			<button type="reset" name="cancel">Cancel registration</button>
	</form>
		<?php /*		
		if(!isset($_GET['signup'])) {
			exit();
		} else {
			$signupCheck = $_GET['signup'];
			
			if($signupCheck == "empty") {
			echo "Please complete all fields";
			exit();
			} elseif($signupCheck == "char") {
			echo "Please only user letters";
			exit(); 
		} elseif($signupCheck == "email") {
			echo "Email must include @";
			exit(); 
			} elseif($signupCheck == "success") {
				echo "success";
				exit();
			}
		}*/
		$fullURL = "http;//$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
		if (strpos($fullURL, "signup=empty") == true) {
			echo "Please complete all fields";
			exit();
		}
		else if (strpos($fullURL, "signup=char") == true) {
			echo "Please only use letters and numbers";
			exit();
		}
		else if (strpos($fullURL, "signup=email") == true) {
			echo "Invalid email";
			exit();
		}
		else if (strpos($fullURL, "signup=Passworddontmatch") == true) {
			echo "Your password does not match";
			exit();
		}
		else if (strpos($fullURL, "signup=success") == true) {
			echo "Success";
			exit();
		}
		?>
		</div>
</body>
</html>