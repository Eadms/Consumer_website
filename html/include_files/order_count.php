<?php
date_default_timezone_set('Australia/Sydney'); //sets the correct timezone for the date			
$CustomerID = $_SESSION['customerID'];	//sets the variable for the SQL statement	
$todaysDate = date("Y-m-d"); //sets the variable for the SQL statement	 

//selects the order data where the customer ID matches the user and the order date is today's date			
$sql = "SELECT orders.OrderID, orders.CustomerID, orders.OrderDate, orderline.OrderQuantity, orderline.OrderID FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID WHERE orders.CustomerID = '". $CustomerID ."' AND orders.OrderDate = '".$todaysDate."'";
$result = mysqli_query($conn, $sql);

//creates an array of the query string values
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

//if 'success' is in the query string then the amount ordered will be displayed. This is done to reset the count after it resets to 0 when the payment button is clicked			
if (isset($queries['order'])){
	$_SESSION['orderSuccess'] = $queries['order'];
	}		
			
// Return the number of rows in result set
$rowcount = mysqli_num_rows($result);

//if the query string contains 'success', echo the cart amount or else echo 0. This function is to enable the reset to 0 after clicking payment			
if(isset($_SESSION['orderSuccess'])) {
	echo "<p>amount ordered: ", $rowcount = mysqli_num_rows($result), " ", "<a href='cart.php' target='_blank' onclick='openCart()'>Items in Cart</a></p>";
} else {
	echo  "<p>amount ordered: 0", " ", "<a href='cart.php' target='_blank' onclick='openCart()'>Items in Cart</a></p>"; 
}