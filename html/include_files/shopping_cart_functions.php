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
$price = $_POST['total-price'];
$productID = $_POST['productID'];
$date = $_POST['date'];
$CustomerID = $_POST['CustomerID'];
$todaysDate = date("Y-m-d");
	
$join = "SELECT orders.OrderID, orders.CustomerID, orders.OrderDate, orderline.ProductID, orderline.OrderQuantity, product.ProductDescription, product.ProductPrice FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID INNER JOIN product ON orderline.ProductID = product.ProductID WHERE product.ProductID = '".$productID."'";	

$joinresult = mysqli_query($conn, $join);
$joincheck = mysqli_num_rows($joinresult);
$result = mysqli_fetch_assoc($joinresult);	
	/*mysqli_insert_id
$productCheck = "SELECT * FROM product where ProductID = '".$productID."'";	
$result = $pdo->prepare($productCheck);
$result->execute();
$dbproduct = $result->fetch(); //fetches the database information	
*/


if($productID != $result['ProductID']) {
	header("location: ../members.php?Error=ProductID");
	exit();
} elseif ($quantity <= 0) {
	echo "<script type='text/javascript'>alert('Please enter a quantity of at least 1');</script>";
	header("location: ../members.php?Error=zero");
	exit();
} elseif (!preg_match("/^[1-9]*$/", $quantity)) {
	header("location: ../members.php?Error=numerals");
} elseif ($result['OrderDate'] == $todaysDate && $result['CustomerID'] == $CustomerID) {
$orderID = mysqli_insert_id($conn);
mysqli_query($conn, "INSERT into orderline(OrderID, ProductID, OrderQuantity)  VALUES ('". $orderID."', '". $_POST['productID']."', '". $_POST['quantity']."' )");
} else {
mysqli_query($conn, "INSERT into orders(CustomerID, OrderDate) VALUES ('". $_POST['CustomerID'] ."', '". $_POST['date'] ."')");
	$orderID = mysqli_insert_id($conn);
mysqli_query($conn, "INSERT into orderline(OrderID, ProductID, OrderQuantity)  VALUES ('". $orderID."', '". $_POST['productID']."', '". $_POST['quantity']."' )");
	header('location: ../Members.php?order=success'); //redirects the user to the login page if registration is successful 		
exit();
}
}

