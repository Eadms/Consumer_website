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
?>
	<body><h1>Your Cart</h1>
	
	<?php
if(!isset($_SESSION['Member'])) {
header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in
	
$CustomerID = $_SESSION['customerID'];		
$todaysDate = date("Y-m-d");
//where CustomerID = '".$CustomerID."' AND 
	
//$checkDatabase = "SELECT * FROM orders WHERE OrderID IN ('".$todaysDate."', '".$CustomerID."')";	
	
$checkDatabase = "SELECT * FROM orders WHERE CustomerID = '". $CustomerID ."'";
$result = mysqli_query($conn, $checkDatabase);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);
	
$checkDatabases2 = "SELECT * FROM orderline WHERE OrderID = '". $row['OrderID'] ."'";
$results = mysqli_query($conn, $checkDatabases2);
$resultChecks = mysqli_num_rows($results);
$rows = mysqli_fetch_assoc($results);
	
$checkDatabases3 = "SELECT * FROM product WHERE ProductID = '". $rows['ProductID'] ."'";
$results3 = mysqli_query($conn, $checkDatabases3);
$resultChecks3 = mysqli_num_rows($results3);
$rows3 = mysqli_fetch_assoc($results3);	
	
	
while ($rows = mysqli_fetch_assoc($results))	{
	echo "Product ID: ", $rows['ProductID'], "<br>", "Product Quantity: ", $rows['OrderQuantity'], "<br>", "Product Description: ", $rows3['ProductDescription'], "<br>", "Product Price: ", $rows3['ProductPrice'], "<br>", "Total line price: ", "<br>", "<button type='button'>Delete item</button>", "<hr>";	
}

	?>
	<form>
<button type="button">Close Cart</button>
<button type="button">Delete Cart</button>
<button tye="button">Confirm Order</button>
	</form>
</body>
</html>
