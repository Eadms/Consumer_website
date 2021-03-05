<?php 
require 'database.inc.php';
$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

if (isset($_POST['email'], $_POST['Username'], $_POST['firstName'], $_POST['lastName'], $_POST['pwd'], $_POST['pwdRepeat'])) {
$email = $_POST['email']; //creates variables based on the user's inputs into the input boxes
$Username = $_POST['Username'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$pwd = $_POST['pwd'];
$pwdrepeat = $_POST['pwdRepeat'];
	
//checks the customer table to see if there is an email that matches the email in the submitted form
$mysql = "SELECT * FROM customer WHERE CustomerEmail = '".$email."'"; 
$result = $pdo->prepare($mysql);
$result->execute();
$user = $result->fetch(); //fetches the database information
		
	if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) { //checks that first/last name only contains characters
			header("location: ../member_registration.php?signup=char"); //redirects page with query string which displays error message
			exit();
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //checks that the email is a valid format
		header("location: ../member_registration.php?signup=email"); //redirects page with query string which displays error message
			exit();
		} elseif(preg_match("/^[\/\\.\\%\\@\\?\n]*$/", $Username)) { //checks that the username doesn't contain certain characters
			header("location: ../member_registration.php?signup=charusername"); //redirects page with query string which displays error
			exit();
		} elseif(!preg_match("/^[a-zA-Z\\1-9\\.\\/\n]*$/", $pwd) || !preg_match("/^[a-zA-Z]*$/", $pwdrepeat)) { //checks that the password doesn't contain certain characters
			header("location: ../member_registration.php?signup=charpwd"); //redirects page with query string which displays error
			exit();
		} elseif($pwd !== $pwdrepeat) { //checks that the password has been typed correctly into both input boxes
		header("location: ../member_registration.php?signup=Passworddontmatch"); //redirects page with query string which displays error message
		exit();
	} elseif($email !== $user['CustomerEmail']) { //checks if the email entered matches an email in the database
		header("location: ../customer_registration.php?signup=norecord");
		exit();
	} else {
		//adds the customer information into the member's table and adds the same CustomerID number that is in the customer table
	$register = "INSERT into members(CustomerID, UserID, HashedPassword, first_name, last_name, email)
VALUES ('". $user['CustomerID'] ."','". $_POST['Username'] ."','". password_hash($_POST['pwd'],PASSWORD_DEFAULT) ."','".$_POST['firstName'] ."','".$_POST['lastName'] ."','". $_POST['email'] ."')";
		mysqli_query($conn, $register);
		header('location: ../member_login.php?login=success'); //redirects the user to the login page if registration is successful 
		session_unset(); //unsets the variables set when creating an account
	} 	
}
?>