<!DOCTYPE html>
<html lang="en-au">
<head>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
    <link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
	<title>Bazaar Cermaics Member Login</title>
</head>
<body>
    <header>
		<?php include 'include_files/Navigation.inc';
         include 'include_files/Banner_and_welcome_message.php';
	include 'include_files/login.php';
		?>
    </header>
    <h1>Member Login</h1>
	<p>Use the form below to login to the Bazaar Ceramics Members page</p>
	<div class="form-container">
    <form action="include_files/login.php" method="post" class="login-form">
	<label for="Username">Username</label>
	<input type="text" name="Username" placeholder="Username" required>
		<br>
	<label for="password">Password</label>
	<input type="password" name="password" placeholder="Password" required>
		<br>
	<button type="submit" class="login-button">Login</button>
		<button type="reset" class="login-button">Reset</button>
	</form>
		</div>
	

	<?php 
	//if(!isset($_GET['login'])) {
			//exit();
		//} else {
			$loginCheck = $_GET['login'];
			if($loginCheck == "success") {
				echo "<script language='Javascript'>alert('You have been successfully added to our Member database. Please login to access the Members page');</script>";
				exit();
			} elseif($loginCheck == "error") {
			echo '<p class="error">Your username or password is incorrect. Please try again</p>';
			exit(); 
			} elseif($loginCheck == "notloggedin") {
				echo "<script>alert('Please login to continue to the Members page.);</script>";
			}
	
	?>
</body>
</html>