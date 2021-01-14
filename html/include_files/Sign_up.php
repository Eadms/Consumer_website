<?php 

$serverName = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bazaarceramics_db";
$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);


if (isset($_POST['email'], $_POST['Username'], $_POST['firstName'], $_POST['lastName'], $_POST['pwd'], $_POST['pwdRepeat'])) {
$email = $_POST['email'];
$Username = $_POST['Username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$pwd = $_POST['pwd'];
$pwdrepeat = $_POST['pwdRepeat'];
	
	if (empty($firstName) || empty($email) || empty($Username) || empty($lastName) || empty($pwd) || empty($pwdrepeat)) {
		header('location: ../Customer_registration.php?signup=empty');
		exit();
	} elseif (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header('location: ../Customer_registration.php?signup=char');
			exit();
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			header("location: ../Customer_registration.php?signup=email&firstName=$firstName&lastName=$lastName&Username=$Username");
			//exit();
		} elseif($pwd !== $pwdrepeat) {
	header('location: ../Customer_registration.php?Passworddontmatch');
	echo 'Your password does not match';
		exit();
	} else {
	$register = "INSERT into members(UserID, HashedPassword, first_name, last_name, email)
VALUES ('". $_POST['pwd'] ."','". $_POST['Username'] ."','".$_POST['firstName'] ."','".$_POST['lastName'] ."','". $_POST['email'] ."')";

mysqli_query($conn, $register);
		 
	} 
	
}


/*
if (empty(($_POST['email']) || ($_POST['Username']) || ($_POST['firstName']) || ($_POST['lastName']) || $_POST['pwd'] || $_POST['pwdRepeat'])) {
	header('location: ../Customer_registration.php?missingdata');
	echo 'Please complete all fields';
}
if (empty($_POST['email'])) {
	header('location: ../Customer_registration.php?Noemail');
	$emailError = 'Please enter your email';
}


if ($pwd !== $pwdrepeat) {
	header('location: ../Customer_registration.php?Passworddontmatch');
	echo 'Your password does not match';
};
*/

?>