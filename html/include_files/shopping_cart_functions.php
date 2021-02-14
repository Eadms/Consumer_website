<?php 
//require 'database.inc.php';

$serverName = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bazaarceramics_db";
	$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

if (isset($_POST['item_description'], $_POST['quantity'], $_POST['total-price'], $_POST['productID'])) {
//creates variables based on the inputs into the input boxes
$item = $_POST['item_description'];
$quantity = $_POST['quantity'];
$price = $_POST['total-price'];
$productID = $_POST['ProductID'];
$orderID
	
$register = "INSERT into orderline(ProductID, OrderQuantity)
VALUES ('". $_POST['ProductID'] ."','". $_POST['quantity'] ."')";
		mysqli_query($conn, $register);
		header('location: ../Members.php?order=success'); //redirects the user to the login page if registration is successful 		
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