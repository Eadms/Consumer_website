<?php 
require 'database.php';
//creates variables based on the information submitted by the user in the input fields
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

session_start(); //creates a session so that the form data remains in the input boxes after the page is redirected
//session variables to keep form data in form when page refreshes with error message. 	
$_SESSION['firstName'] = $firstName;
$_SESSION['lastName'] = $lastName;
$_SESSION['email'] = $email;
$_SESSION['address'] = $address;
$_SESSION['suburb'] = $suburb;
$_SESSION['state'] = $state;
$_SESSION['postcode'] = $postcode;
$_SESSION['phone'] = $phone;
$_SESSION['country'] = $country;
	
	if (!preg_match("/^[a-zA-Z]*$/", $firstName) || !preg_match("/^[a-zA-Z]*$/", $lastName)) { //checks that only a-z is used the first and last name
			header("location: ../Customer_registration.php?signup=char");
			exit();
		} elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) { //checks that the email is valid
		header("location: ../Customer_registration.php?signup=email");
			exit();
		} elseif(strpos($phone, ' ')!== false) { //checks that there are no blank spaces in the number field
			header("location: ../Customer_registration.php?signup=whitespace");
			exit();
	} else {
		//enters the customer information into the database in the customer table
	$register = "INSERT into customer(CustomerGivenName, CustomerLastName, CustomerEmail, CustomerAddress, CustomerSuburb, CustomerState, CustomerPostCode, CustomerCountry, CustomerPhoneNumber)
VALUES ('".$_POST['firstName'] ."','".$_POST['lastName'] ."','". $_POST['email'] ."', '".$_POST['address'] ."','".$_POST['suburb'] ."','". $_POST['state'] ."', '".$_POST['postcode'] ."','".$_POST['country'] ."','". $_POST['phone'] ."')";
		mysqli_query($conn, $register);
		header('location: ../member_registration.php?signup=customerregistration'); //redirects the customer to the member registration page if customer registration is successful
		}
}
?>