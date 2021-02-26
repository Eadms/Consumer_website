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
//where CustomerID = '".$CustomerID."' AND 
	
//$checkDatabase = "SELECT * FROM orders WHERE OrderID IN ('".$todaysDate."', '".$CustomerID."')";	
	
$join = "SELECT OrderID FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID";
		
mysqli_query($conn, $join);
	$resultChecks33 = mysqli_num_rows($join);
$rows33 = mysqli_fetch_assoc($resultChecks33);	
		
		
		while($row33 = mysqli_fetch_assoc($join)) {
        echo $row33['OrderID'];
        echo "<br>";
    }
	
	//"SELECT orders.OrderID FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID INNER JOIN ";
	
		
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
	echo "<p><b>Product ID: </b>", $rows['ProductID'], "<br>", "<b>Product Quantity: </b>", $rows['OrderQuantity'], "<br>", "<b>Product Description: </b>", $rows3['ProductDescription'], "<br>", "<b>Product Price: </b>$", $rows3['ProductPrice'], "<br>", "<b>Total line price: </b>", "$", $calc = $rows['OrderQuantity'] * $rows3['ProductPrice'] , "<br>", "<button type='button'>Delete item</button>", "<hr></p>";
}
			echo "<p>Total cost: ", "$",$calc, "</p>";
	?>
<form>
<button type="button">Close Cart</button>
<button type="button">Delete Cart</button>
<button tye="button">Confirm Order</button>
	</form>
</body>
</html>
