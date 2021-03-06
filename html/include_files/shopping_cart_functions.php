<?php 
require 'database.inc.php';
$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

date_default_timezone_set('Australia/Sydney'); //sets the timezone

if (isset($_POST['quantity'], $_POST['total-price'], $_POST['productID'], $_POST['date'], $_POST['CustomerID'], $_POST['orderID'])) { //checks the the POST values have been created

//creates variables based on the inputs into the input boxes
$quantity = $_POST['quantity'];
$price = $_POST['total-price'];
$productID = $_POST['productID'];
$date = $_POST['date'];
$CustomerID = $_POST['CustomerID'];
$orderID = $_POST['orderID'];
	
//retrives product information from the databse where productID matched the POST information
$productCheck = "SELECT * FROM product where ProductID = '".$productID."'";	
$result = $pdo->prepare($productCheck);
$result->execute();
$dbproduct = $result->fetch(); //fetches the database information	

if($productID != $dbproduct['ProductID']) {
	header("location: ../members.php?Error=ProductID"); //redirects and shows an error message
	exit();
} elseif ($quantity <= 0) {
	echo "<script type='text/javascript'>alert('Please enter a quantity of at least 1');</script>";
	header("location: ../members.php?Error=zero"); //redirects and shows an error message
	exit();
} elseif (!preg_match("/^[1-9]*$/", $quantity)) {
	header("location: ../members.php?Error=numerals"); //redirects and shows an error message
} elseif (!empty($orderID)) { //if there is no orderID already, insert into the orders and orderline tables
mysqli_query($conn, "INSERT into orderline(OrderID, ProductID, OrderQuantity)  VALUES ('". $orderID."', '". $productID."', '". $quantity."' )");	
	header('location: ../members.php?order=success'); 
} else { //if there is already an OrderID, just insert into the orderline table
mysqli_query($conn, "INSERT into orders(CustomerID, OrderDate) VALUES ('". $CustomerID ."', '". $date ."')");
$orderstableID = mysqli_insert_id($conn); //retrives the OrderID that was created
mysqli_query($conn, "INSERT into orderline(OrderID, ProductID, OrderQuantity)  VALUES ('". $orderstableID."', '". $productID."', '". $quantity."' )");
header('location: ../members.php?order=success'); //redirects the user back to the member page
exit();
}
}
