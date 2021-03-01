<?php 

require 'database.inc.php';
include 'member_login_functions.inc.php';


if (isset($POST_['productID']) && isset($POST_['quantity']) && isset($POST_['price'])) {
	$delete = "DELETE FROM orderline WHERE OrderID = '".$POST_['OrderID']."' AND WHERE OrderQuantity = '".$POST_['productID']."'";
	
$result = mysqli_query($conn, $delete);
header("location: ../cart.php");

}

