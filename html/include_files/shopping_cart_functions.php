<?php 
//require 'database.inc.php';
$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

$serverName = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bazaarceramics_db";
	$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

if (isset($_POST['quantity'], $_POST['total-price'], $_POST['productID'], $_POST['date'], $_POST['CustomerID'])) {
//creates variables based on the inputs into the input boxes
$quantity = $_POST['quantity'];
//$price = $_POST['total-price'];
$productID = $_POST['productID'];
$date = $_POST['date'];
$CustomerID = $_POST['CustomerID'];
	
$mysql = "SELECT * FROM orders WHERE CustomerID = '".$CustomerID."'"; 
$result = $pdo->prepare($mysql);
$result->execute();
$user = $result->fetch(); //fetches the database information	
	
$submitOrder = "INSERT into orders(CustomerID, OrderDate) VALUES ('". $_POST['CustomerID'] ."', '". $_POST['date'] ."')";
//$submitOrdertwo = "INSERT into orderline(OrderID, ProductID, OrderQuantity)  VALUES ('". $user['OrderID']."', '". $_POST['productID']."', '". $_POST['quantity']."' )";	
	mysqli_multi_query($conn, $submitOrder);
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