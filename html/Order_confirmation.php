<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Order Complete</title>
	<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
	<script src="../scripts/Form.js"></script>
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

date_default_timezone_set('Australia/Sydney');	//sets the timezone
	
$CustomerID = $_SESSION['customerID']; //sets variable for customerID		
$todaysDate = date("Y-m-d"); //sets variable for today's date
	
$checkDatabase = "SELECT * FROM orders WHERE CustomerID = '". $CustomerID ."' AND OrderDate = '".$todaysDate."'"; //retrives order info which corresponds to the CustomerID and date
$result = mysqli_query($conn, $checkDatabase);
$resultCheck = mysqli_num_rows($result);
$row = mysqli_fetch_assoc($result);	//stores the results in an associative array	
		
if($CustomerID == isset($row['CustomerID']) && $todaysDate == isset($row['OrderDate'])) {
	//joins the orders, orderline, customer and products tables if there are records that correspond to the CustomerID and date
	echo "<p>Product order details<p>";
	$customerjoin = "SELECT orders.OrderID, orders.CustomerID, orders.OrderDate, orderline.ProductID, orderline.OrderQuantity, product.ProductDescription, product.ProductPrice, customer.CustomerGivenName, customer.CustomerLastName, customer.CustomerAddress, customer.CustomerSuburb, customer.CustomerState, customer.CustomerPostCode, customer.CustomerCountry FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID INNER JOIN product ON orderline.ProductID = product.ProductID INNER JOIN customer ON orders.CustomerID = customer.CustomerID WHERE orders.CustomerID = '". $CustomerID ."' AND orders.OrderDate = '". $todaysDate ."'";
	
	$customerjoinresult = mysqli_query($conn, $customerjoin); //performs the SQL query
	//$customerjoincheck = mysqli_num_rows($customerjoinresult); 

	//loops through the rows that are retrived from the database and prints them to the browser
	while ($customerjoinloop = mysqli_fetch_assoc($customerjoinresult))	{
	echo "<p><b>Product ID: </b>", $customerjoinloop['ProductID'], "<br>", "<b>Product Quantity: </b>", $customerjoinloop['OrderQuantity'], "<br>", "<b>Product Description: </b>", $customerjoinloop['ProductDescription'], "<br>", "<b>Product Price: </b>$", $customerjoinloop['ProductPrice'], "<br>", "<b>Total line price: </b>", "$", $calc = $customerjoinloop['OrderQuantity'] * $customerjoinloop['ProductPrice'], "<hr>" ,"</p>";
		
		$items[] = $calc; //turns the results of the calculation of quantity and item price into an array
		
		//variables created based on the array
		$address = $customerjoinloop['CustomerAddress'];
		$suburb = $customerjoinloop['CustomerSuburb'];
		$state = $customerjoinloop['CustomerState'];
		$postcode = $customerjoinloop['CustomerPostCode'];
		$country = $customerjoinloop['CustomerCountry'];
		$customerfirstname = $customerjoinloop['CustomerGivenName'];
		$customerlastname = $customerjoinloop['CustomerLastName'];
		$ordernumber = $customerjoinloop['OrderID'];
	}
	//prints the retrieved customer information below the while loop items
	echo " <p>Total order details", "<br>","<b>Order Number: </b>" ,$ordernumber,"<br>", "<b>Order Date: </b>",$todaysDate, "<br>", "<b>Total cost: </b>", "$",array_sum($items), "<br>", "<b>Customer Name: </b>", $customerfirstname, " ", $customerlastname, "<br>", "<b>Delivery Address: </b>", $address, ", ",$suburb, ", ", $state, " ", $postcode, ", ", $country, "</p>";
} else {
	echo "<p>Your cart is empty</p>"; //displays a message that the cart is empty if the user goes to this page without ordering anything
}
	?>
	<form action="include_files/payment.php" method="post"><!--takes the user to the payment files which has a function that reset the cart number-->
	<button type="submit">Payment</button>
	</form>
</body>
</html>