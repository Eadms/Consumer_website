<?php 
require 'database.inc.php';
if (isset($_POST['item'], $_POST['quantity'], $_POST['total-price'], $_POST['productID'])) {
//creates variables based on the user's inputs into the input boxes
$item = $_POST['item'];
$quantity = $_POST['quantity'];
$price = $_POST['total-price'];
$productID = $_POST['ProductID'];
	
	
	/*
$productCheck = "SELECT * FROM product"	
	
if($item != $item) {
	
}
{ header("location: ../members_order.php?order=item");
	exit();
}*/ if ($quantity <= 0) {
	header("location: ../members_order.php?order=zero");
	exit();
} elseif (!preg_match("/^[1-9]*$/", $quantity)) {
	header("location: ../members_order.php?order=numerals");
} 
}