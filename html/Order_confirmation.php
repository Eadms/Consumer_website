<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Complete</title>
	<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
</head>
<body>
	<?php 
	include 'include_files/navigation.inc.php';
	include 'include_files/banner.inc.php';
	include 'include_files/member_login_functions.inc.php';
	require 'include_files/database.inc.php';
	include 'include_files/welcome_message.inc.php';
	?>
	<header><h1>Order Confirmation</h1></header>
	<?php
if(!isset($_SESSION['Member'])) {
header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in
	
$CustomerID = $_SESSION['customerID'];		
$todaysDate = date("Y-m-d");
	
	
$checkDatabase = "SELECT * FROM orders WHERE CustomerID = '". $CustomerID ."' AND OrderDate = '".$todaysDate."'";
$result = mysqli_query($conn, $checkDatabase);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);		
		
if($CustomerID == isset($row['CustomerID']) && $todaysDate == isset($row['OrderDate'])) {
	
	$customerjoin = "SELECT orders.OrderID, orders.CustomerID, orders.OrderDate, orderline.ProductID, orderline.OrderQuantity, product.ProductDescription, product.ProductPrice, customer.CustomerGivenName, customer.CustomerLastName, customer.CustomerAddress, customer.CustomerSuburb, customer.CustomerState, customer.CustomerPostCode, customer.CustomerCountry FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID INNER JOIN product ON orderline.ProductID = product.ProductID INNER JOIN customer ON orders.CustomerID = customer.CustomerID WHERE orders.CustomerID = '". $CustomerID ."' AND orders.OrderDate = '". $todaysDate ."'";
	
	$customerjoinresult = mysqli_query($conn, $customerjoin);
	$customerjoincheck = mysqli_num_rows($customerjoinresult);

	while ($customerjoinloop = mysqli_fetch_assoc($customerjoinresult))	{
	echo "<p><b>Product ID: </b>", $customerjoinloop['ProductID'], "<br>", "<b>Product Quantity: </b>", $customerjoinloop['OrderQuantity'], "<br>", "<b>Product Description: </b>", $customerjoinloop['ProductDescription'], "<br>", "<b>Product Price: </b>$", $customerjoinloop['ProductPrice'], "<br>", "<b>Total line price: </b>", "$", $calc = $customerjoinloop['OrderQuantity'] * $customerjoinloop['ProductPrice'], "<hr>" ,"</p>";
		
		$items[] = $calc;
		$address = $customerjoinloop['CustomerAddress'];
		$suburb = $customerjoinloop['CustomerSuburb'];
		$state = $customerjoinloop['CustomerState'];
		$postcode = $customerjoinloop['CustomerPostCode'];
		$country = $customerjoinloop['CustomerCountry'];
		$customerfirstname = $customerjoinloop['CustomerGivenName'];
		$customerlastname = $customerjoinloop['CustomerLastName'];
	}
	echo "<p><b>Total cost: </b>", "$",array_sum($items), "<br>", "<b>Customer Name: </b>", $customerfirstname, " ", $customerlastname, "<br>", "<b>Delivery Address: </b>", $address, ", ",$suburb, ", ", $state, " ", $postcode, ", ", $country, "</p>";
} else {
	echo "<p>Your cart is empty</p>";
}
	?>
	<button type="button">Payment</button>
</body>
</html>