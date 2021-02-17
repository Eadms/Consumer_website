<?php 
//require 'database.inc.php';

$serverName = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bazaarceramics_db";
	$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

isset($_SESSION['CustomerID']);

if (isset($_POST['quantity'], $_POST['total-price'], $_POST['productID'], $_POST['date'])) {
//creates variables based on the inputs into the input boxes
//$quantity = $_POST['quantity'];
//$price = $_POST['total-price'];
$productID = $_POST['productID'];
$date = $_POST['date'];
$CustomerID = $_SESSION['CustomerID'];

$submitOrder = "INSERT into orders(CustomerID, OrderDate) VALUES ('". $_SESSION['CustomerID'] ."', '". $_POST['date'] ."')";
		mysqli_query($conn, $submitOrder);
		header('location: ../Members.php?order=success'); //redirects the user to the login page if registration is successful 		
		exit();
}
	/*	
$productCheck = "SELECT * FROM product where ProductID = '".$productID."'";	
$result = $conn->query($productCheck);

if($productID != $result) {
	header("location: ../members_order.php?order=item");
	exit();
} else

	if ($quantity <= 0) {
	header("location: ../members_order.php?order=zero");
	exit();
} elseif (!preg_match("/^[1-9]*$/", $quantity)) {
	header("location: ../members_order.php?order=numerals");
} 
}
*/