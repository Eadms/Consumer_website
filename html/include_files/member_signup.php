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

//session variables which are used to keep form data in the form when the page refreshes with error data	
$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['Username'] = $Username;
	
	/*
	$sql = "SELECT * FROM customers WHERE CustomerEmail = '".$email."'"; 
	$result = $pdo->prepare($sql);
	$result->execute();
	$user = $result->fetch();
	
	if($email == $user['CustomerEmail']) {
		header("location:../members.php");
		exit();
	} else {
		header("location:../Member_login.php?login=error");
	}
	*/
	
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
	$register = "INSERT into members(UserID, HashedPassword, first_name, last_name, email)
VALUES ('". $_POST['Username'] ."','". password_hash($_POST['pwd'],PASSWORD_DEFAULT) ."','".$_POST['firstName'] ."','".$_POST['lastName'] ."','". $_POST['email'] ."')";
mysqli_query($conn, $register);
		header('location: ../Member_login.php?'); //redirects the user to the login page if registration is successful
	} 	
}
//$checkmember = mysqli_query("SELECT * FROM customer WHERE CustomerEmail = $email or WHERE CustomerGivenName = $firstName and CustomerLastName = $lastName")

/*
if (empty(($_POST['email']) || ($_POST['Username']) || ($_POST['firstName']) || ($_POST['lastName']) || $_POST['pwd'] || $_POST['pwdRepeat'])) {
	header('location: ../Customer_registration.php?missingdata');
	echo 'Please complete all fields';
}
if (empty($_POST['email'])) {
	header('location: ../Customer_registration.php?Noemail');
	$emailError = 'Please enter your email';
}

*/

?>
