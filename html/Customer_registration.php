<!DOCTYPE html>
<html lang="en-au">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
    <title>Customer registration</title>
</head>
<body>
    <header>
	<?php 
		include 'include_files/navigation.inc.php';
		include 'include_files/banner.inc.php';
		include 'include_files/customer_Sign_up_functions.inc.php';
		include 'include_files/welcome_message.inc.php';
		?>
	<script>
	function myWindow() {window.location.replace("../Homepage.php")}; //function which closes the window when user clicks the cancel button
	</script>
	</header>
			 <p><h1>Customer Registration</h1></p>
	<p class='instructions'>Register your details below to be added to our customer database</p>
	<div class="form-container"> <!-- form for customers to register details -->
        <form action="include_files/customer_Sign_up_functions.inc.php" method="post" class="sign-up-form">		
			<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" size="11" required>
			<br>
			<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder=" Last name" size="11" required>
			<br>
			<label for "email">Email</label><input type="text" name= "email" placeholder="Email"  size="11" required>
			<br>
			<label for "address">Street Address</label><input type="text" name= "address" placeholder="Street Address" size="11" required>
			<br>
			<label for "suburb">Suburb</label><input type="text" name= "suburb" placeholder="Suburb" size="11" required>
			<br>
			<label for "state">State</label><input type= "text" name="state" placeholder="State" size="11" required>
			<br>
			<label for "postcode">Postcode</label><input type="text" name= "postcode" placeholder="Postcode" size="11" required>
			<br>
			<label for "country">Country</label><input type="text" name= "country" placeholder="Country" size="11" required>
			<br>
			<label for "phone">Phone number</label><input type= "text" name="phone" placeholder="Phone Number" size="11" required>
			<br>
			</div>
		<div class="login-container">
			<button type="submit" name="reg_user" class="registration-button">Register details</button>
			<button type="reset" value="reset" class="registration-button">Reset form</button>
			<button  type="button" onclick="myWindow()" class="registration-button">Cancel Registration</button>
		</div>
	</form>
		<?php 	
	if(!isset($_GET['signup'])) { //checks if the query string key exists
			exit();
	} else {
			$signupCheck = $_GET['signup']; //creates a variable based on the query string
			if($signupCheck == "norecord") {
				echo "<script>alert('You have no record in our member database so you have been redirected to our Customer Registration page. Please sign up to our customer database.');</script>"; //alert message which displays based on the query string after the user has been redirected from the member registration page if htey don't have a member record
			exit();
			} elseif($signupCheck == "char") { //error messages 
			echo '<p class="error">Please only user letters in your first and last name</p>'; 
			exit(); 
			} elseif($signupCheck == "email") { //error messages
			echo '<p class="error">Invalid email</p>';
			//exit(); 
			} elseif($signupCheck == "whitespace") {
			echo '<p class="error">Please do not include spaces in your phone number</p>';
			exit(); 
			}  	
	}
		?>
</body>
</html>