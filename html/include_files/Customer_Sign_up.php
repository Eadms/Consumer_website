<?php 
session_start();
$serverName = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bazaarceramics_db";
$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

//$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

if (isset($_POST['email'], $_POST['Username'], $_POST['firstName'], $_POST['lastName'], $_POST['pwd'], $_POST['pwdRepeat'])) {
$email = $_POST['email'];
$Username = $_POST['Username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$pwd = $_POST['pwd'];
$pwdrepeat = $_POST['pwdRepeat'];

//session variables to keep form data in form when page refreshes with error message. Password is deliberately not included	
$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['Username'] = $Username;
	
	if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header("location: ../Customer_registration.php?signup=char");
			exit();
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		header("location: ../Customer_registration.php?signup=email");
			exit();
		} elseif(preg_match("/^[\/\\.\\%\\@\\?\n]*$/", $Username)) {
			header("location: ../Customer_registration.php?signup=charusername");
			exit();
		} elseif($pwd !== $pwdrepeat) {
	header("location: ../Customer_registration.php?signup=Passworddontmatch");
		exit();
	} else {
	$register = "INSERT into customer(UserID, HashedPassword, first_name, last_name, email)
VALUES ('". $_POST['Username'] ."','". password_hash($_POST['pwd'],PASSWORD_DEFAULT) ."','".$_POST['firstName'] ."','".$_POST['lastName'] ."','". $_POST['email'] ."')";
		mysqli_query($pdo, $register);
		header('location: ../member_signup.php?'); //redirects the user to the login page if registration is successful
	} 
	
}


?>