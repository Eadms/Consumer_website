<?php 
require 'database.inc.php';

if(isset($_POST['price'], $_POST['quantity'],$_POST['orderID'], $_POST['ProductID'] ));

$quantity = $_POST['quantity'];
$orderID = $_POST['orderID']; 
$productID = $_POST['ProductID'];

$delete = "DELETE FROM orderline WHERE orderline.OrderID = '".$orderID."' AND orderline.OrderQuantity = '".$quantity."' AND orderline.ProductID = '".$productID."'";

mysqli_query($conn, $delete);
header('location: ../cart.php');
