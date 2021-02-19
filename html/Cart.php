<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Your shopping cart</title>
<link rel="stylesheet"  type='text/css' href="../styles/customer_registration.css">
</head>
	<?php include 'include_files/banner.inc.php';?>
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
