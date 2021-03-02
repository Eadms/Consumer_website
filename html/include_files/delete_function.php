<?php 

$serverName = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bazaarceramics_db";
$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);

if(isset($_POST['price'], $_POST['quantity'],$_POST['ProductID'] ));

echo $_POST['price'], $_POST['quantity'];
/*
if(isset($POST_['productID'], $POST_['quantity'], $POST_['OrderID'])) {
	
	$productID = $POST_['productID']; 
	$quantity = $POST_['quantity']; 
	$orderID = $POST_['OrderID'];
	
	echo "hi ", $productID, $quantity, $orderID;
	
	//$delete = "DELETE FROM orderline WHERE OrderID = '".$orderID."' AND OrderQuantity = '".$quantity."'";
	
//mysqli_query($conn, $delete);
//header('location: ../cart.php');

}
*/
