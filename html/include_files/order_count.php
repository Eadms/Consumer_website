<p>amount ordered: 
<?php
date_default_timezone_set('Australia/Sydney');
	
$CustomerID = $_SESSION['customerID'];		
$todaysDate = date("Y-m-d");	
				
$sql = "SELECT orders.OrderID, orders.CustomerID, orders.OrderDate, orderline.OrderQuantity, orderline.OrderID FROM orders INNER JOIN orderline ON orders.OrderID = orderline.OrderID WHERE orders.CustomerID = '". $CustomerID ."' AND orders.OrderDate = '".$todaysDate."'";
$result = mysqli_query($conn, $sql);
  
  // Return the number of rows in result set
  $rowcount = mysqli_num_rows($result);
	
if(isset($_SESSION['orderSuccess'])) {
	echo $rowcount = mysqli_num_rows($result), " ";
} else {
	echo "0", " "; 
}
  // Free result set
  mysqli_free_result($result);

?><a href="cart.php" target="_blank" onclick="openCart()">Items in Cart</a>