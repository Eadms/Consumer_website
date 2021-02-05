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
		include 'include_files/Banner.php';
		include 'include_files/Customer_Sign_up.php';
		error_reporting(0);
			?>
		<script>
	function myWindow() {window.location.replace("../Homepage.php")};
	</script>
		     </header>
			 <p><h1>Customer Registration</h1></p>
	<p>Register your details below to be added to our customer database</p>
	<div class="form-container">
        <form action="include_files/Customer_Sign_up.php" method="post" class="sign-up-form">		
			<label for "firstName">First name</label><input type="text" name= "firstName" placeholder="First name" value="<?php echo $_SESSION['firstName']?>" required>
			<br>
			<label for "lastName">Last name</label><input type="text" name= "lastName" placeholder=" Last name" value="<?php echo $_SESSION['lastName']?>" required>
			<br>
			<label for "email">Email</label><input type="text" name= "email" placeholder="Email" value="<?php echo $_SESSION['email']?>">
			<br>
			<label for "address">Street Address</label><input type="text" name= "address" placeholder="Street number and name" value="<?php echo $_SESSION['address']?>" required>
			<br>
			<label for "suburb">Suburb</label><input type="text" name= "suburb" placeholder="Suburb" value="<?php echo $_SESSION['suburb']?>" required>
			<br>
			<label for "state">State</label><input type= "text" name="state" placeholder="State" value="<?php echo $_SESSION['state']?>" required>
			<br>
			<label for "postcode">Postcode</label><input type="text" name= "postcode" placeholder="Postcode" value="<?php echo $_SESSION['postcode']?>" required>
			<br>
			<label for "country">Country</label><input type="text" name= "country" placeholder="Country" value="<?php echo $_SESSION['country']?>" required>
			<br>
			<label for "phone">Phone number</label><input type= "text" name="phone" placeholder="Phone Number" value="<?php echo $_SESSION['phone']?>" required>
			<br>
			<button type="submit" name="reg_user" class="registration-button">Register details</button>
			<button type="reset" value="reset" class="registration-button">Reset form</button>
			<button  type="button" onclick="myWindow()" class="registration-button">Cancel Registration</button>
	</form>
	</div>
		<?php 		
			$signupCheck = $_GET['signup'];
			if($signupCheck == "norecord") {
				echo "<script>alert('You have no record in our member database so you have been redirected to our Customer Registration page. Please sign up to our customer database.');</script>";
				exit();
			} elseif($signupCheck == "email") {
			echo '<p class="error">Invalid email</p>';
			exit(); 
			} elseif($signupCheck == "whitespace") {
			echo '<p class="error">Please do not include spaces in your phone number</p>';
			exit(); 
			} elseif($signupCheck == "success") {
				echo "success";
				exit();
			} 												
		?>
</body>
</html>