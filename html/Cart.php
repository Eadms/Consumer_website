<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your shopping cart</title>
<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
	<script src="../scripts/Form.js"></script>
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

	while ($joinloop = mysqli_fetch_assoc($joinresult))	{
	echo "<p><b>Product ID: </b>", $joinloop['ProductID'], "<br>", "<b>Product Quantity: </b>", $joinloop['OrderQuantity'], "<br>", "<b>Product Description: </b>", $joinloop['ProductDescription'], "<br>", "<b>Product Price: </b>$", $joinloop['ProductPrice'], "<br>", "<b>Total line price: </b>", "$", $calc = $joinloop['OrderQuantity'] * $joinloop['ProductPrice'] , "<br>", "<form action='include_files/delete_function.php' method='post'><input type='hidden' name='productID' value= '". $joinloop['ProductID'] ."'></input><input type='hidden' name='quantity' value= '". $joinloop['OrderQuantity'] ."'></input><input type='hidden' name='price' value= '". $joinloop['ProductPrice'] ."'></input><input type='hidden' name='productID' value= '". $joinloop['ProductID'] ."'></input><input type='hidden' name='orderID' value= '". $joinloop['OrderID'] ."'></input><button type='submit'>Delete item</button></form>", "<hr></p>";
		$items[] = $calc;
	}
	echo "<p>Total cost: ", "$",array_sum($items) , "</p>";
	
} else {
	echo "<p>Your cart is empty</p>";
}		
	?>
<form>
<button type="button" onclick="closeWindow()">Close Cart</button>
<button type="button">Delete Cart</button>
<button tye="button" onclick="openConfirmpage()">Confirm Order</button>
	</form>
</body>
</html>
