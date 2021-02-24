<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your shopping cart</title>
<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
</head>
	<?php 
	include 'include_files/navigation.inc.php';
	include 'include_files/banner.inc.php';
	include 'include_files/member_login_functions.inc.php';
	require 'include_files/database.inc.php';
	include 'include_files/welcome_message.inc.php'; 

if(!isset($_SESSION['Member'])) {
header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in
	
$CustomerID = $_SESSION['customerID'];		
$todaysDate = date("Y-m-d");
//where CustomerID = '".$CustomerID."' AND 
	
//$checkDatabase = "SELECT * FROM orders WHERE OrderID IN ('".$todaysDate."', '".$CustomerID."')";	
	
$checkDatabase = "SELECT * FROM orders WHERE OrderDate = '". $todaysDate ."'";
	
$result = mysqli_query($conn, $checkDatabase);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);	
	
	echo $row['OrderID'];

	?>
<body><h1>Your Cart</h1>
	<form>
		<label for="product_code">Product Code</label>
		<input type="text" name="product_code"></input>
		<label for="description">Description</label>
	<input type="text" name="description"></input>
	<label for="quantity">Quantity</label>	
	<input type="text" name="quantity"></input>
<label for="price">Unit Price</label>		
<input type="text" name="price"></input>
		<label for="total_price">Total Price</label>		
<input type="text" name="total_price"></input>
<button type="button">Close Cart</button>
<button type="button">Delete Cart</button>
<button tye="button">Confirm Order</button>
	</form>
</body>
</html>
