<?php 
$serverName = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bazaarceramics_db";
$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

//$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

if (isset($_POST['email'], $_POST['firstName'], $_POST['lastName'], $_POST['address'], $_POST['suburb'], $_POST['state'], $_POST['postcode'], $_POST['phone'], $_POST['country'])) {
$email = $_POST['email'];
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$address = $_POST['address'];
$suburb = $_POST['suburb'];
$state = $_POST['state'];
$postcode = $_POST['postcode'];
$phone = $_POST['phone'];
$country = $_POST['country'];

//session variables to keep form data in form when page refreshes with error message. Password is deliberately not included	
$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['suburb'] = $suburb;
$_SESSION['state'] = $state;
$_SESSION['postcode'] = $postcode;
$_SESSION['phone'] = $phone;
$_SESSION['country'] = $country;
	
	if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) {
			header("location: ../Customer_registration.php?signup=char");
			exit();
		//} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		//header("location: ../Customer_registration.php?signup=email");
			//exit();
		} elseif(strpos($phone, ' ')!== false) {
			header("location: ../Customer_registration.php?signup=whitespace");
			exit();
	} else {
	$register = "INSERT into customer(CustomerGivenName, CustomerLastName, CustomerEmail, CustomerAddress, CustomerSuburb, CustomerState, CustomerPostCode, CustomerCountry, CustomerPhoneNumber)
VALUES ('".$_POST['firstName'] ."','".$_POST['lastName'] ."','". $_POST['email'] ."', '".$_POST['address'] ."','".$_POST['suburb'] ."','". $_POST['state'] ."', '".$_POST['postcode'] ."','".$_POST['country'] ."','". $_POST['phone'] ."')";
		mysqli_query($conn, $register);
		header('location: ../member_registration.php?signup=customerregistration');
		//echo "<script>alert('You have been added into our Member Database. Please login to our Member's page to continue.);</script>";//redirects the user to the login page if registration is successful
		}
}
?>