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
		include 'include_files/Navigation.inc';
		include 'include_files/Banner.inc';
		include 'include_files/Customer_Sign_up.php';
		error_reporting(0);
			?>
		     </header>
			 <p><h1>Customer Registration</h1></p>
	<p>Register your details below to be added to our customer database</p>
	<div class="form-container">
        <form action="include_files/Customer_Sign_up.php" method="post" class="sign-up-form">		
			<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" value="<?php echo $_SESSION['firstName']?>" required>
			<br>
			<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder=" Last name" value="<?php echo $_SESSION['lastName']?>" required>
			<br>
			<label for "email">Email</label><input type="text" name= "email" placeholder="Email" value="<?php echo $_SESSION['email']?>" required>
			<br>
			<label for "address">Street number and name</label><input type="text" name= "Address" placeholder="Street number and name" value="<?php echo $_SESSION['Address']?>" required>
			<br>
			<label for "suburb">Suburb</label><input type="text" name= "suburb" placeholder="Suburb" required>
			<br>
			<label for "state">State</label><input type= "text" name="state" placeholder="State" required>
			<br>
			<label for "postcode">Postcode</label><input type="text" name= "postcode" placeholder="Postcode" required>
			<br>
			<label for "phone">Phone number</label><input type= "text" name="phone" placeholder="Phone Number" required>
			<br>
			<button type="submit" name="reg_user" class="registration-button">Register details</button>
			<button type="reset" name="cancel" class="registration-button">Cancel registration</button>
	</form>
	</div>
		<?php 		
		if(!isset($_GET['signup'])) {
			exit();
		} else {
			$signupCheck = $_GET['signup'];
			if($signupCheck = "norecord") {
				echo "<script>alert('You have no record in our member database so you ahve been redirected to our Customer Registration page. Please sign up to our customer database.');</script>";
			}elseif($signupCheck == "char") {
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