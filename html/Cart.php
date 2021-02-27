<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your shopping cart</title>
<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
</head>
	<style>
		p {
			font-family: arial, helvetica, sans-serif;
		}
	</style>
	<?php 
	include 'include_files/navigation.inc.php';
	include 'include_files/banner.inc.php';
	include 'include_files/member_login_functions.inc.php';
	require 'include_files/database.inc.php';
	include 'include_files/welcome_message.inc.php'; 
?>
	<body><h1>Your Cart</h1>
	
	<?php
if(!isset($_SESSION['Member'])) {
header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in
	
$CustomerID = $_SESSION['customerID'];		
$todaysDate = date("Y-m-d");
		
//joins the orders, orderline and product tables

$checkDatabase = "SELECT * FROM orders WHERE CustomerID = '". $CustomerID ."' AND OrderDate = '".$todaysDate."'";
$result = mysqli_query($conn, $checkDatabase);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);		
		
if($CustomerID == isset($row['CustomerID']) && $todaysDate == isset($row['OrderDate']))  {		
		
$join = "SELECT orders.OrderID, orders.CustomerID, orders.OrderDate, orderline.ProductID, orderline.OrderQuantity, product.ProductDescription, product.ProductPrice FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID INNER JOIN product ON orderline.ProductID = product.ProductID WHERE CustomerID = '". $CustomerID ."' AND OrderDate = '". $todaysDate ."'";

$joinresult = mysqli_query($conn, $join);
$joincheck = mysqli_num_rows($joinresult);

	while ($joinz = mysqli_fetch_assoc($joinresult))	{
	echo "<p><b>Product ID: </b>", $joinz['ProductID'], "<br>", "<b>Product Quantity: </b>", $joinz['OrderQuantity'], "<br>", "<b>Product Description: </b>", $joinz['ProductDescription'], "<br>", "<b>Product Price: </b>$", $joinz['ProductPrice'], "<br>", "<b>Total line price: </b>", "$", $calc = $joinz['OrderQuantity'] * $joinz['ProductPrice'] , "<br>", "<button type='button'>Delete item</button>", "<hr></p>";
		$items[] = $calc;
	}
	echo "<p>Total cost: ", "$",array_sum($items) , "</p>";
	
} else {
	echo "<p>Your cart is empty</p>";
}		
	?>
<form>
	<script>function closeCart() {
  myWindow = window.open("members_page.php");</script>
<button type="button" onclick="closeCart()">Close Cart</button>
<button type="button">Delete Cart</button>
<button tye="button">Confirm Order</button>
	</form>
</body>
</html>
