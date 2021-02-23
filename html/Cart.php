<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your shopping cart</title>
<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
</head>
	<?php include 'include_files/banner.inc.php';
	include 'include_files/member_login_functions.inc.php';
	require 'include_files/database.inc.php';
	include 'include_files/welcome_message.inc.php';
	//$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");
	/*
$productCheck = "SELECT * FROM product where ProductID = '".$productID."'";	
$result = $pdo->prepare($productCheck);
$result->execute();
$dbproduct = $result->fetch();
	*/
if(!isset($_SESSION['Member'])) {
header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in
	
$CustomerID = isset($_SESSION['customerID']);	
	
	$checkDatabase = "SELECT * FROM orders where CustomerID = '".$CustomerID."'";
	
if (isset($_SESSION['Member'])) 

{echo $_SESSION['Member'];
} elseif(!isset($_SESSION['customerID'])) {
	echo "no membersession";
}

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
