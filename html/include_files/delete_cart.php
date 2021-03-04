<?php 
require 'database.inc.php';

if(isset($_POST['orderID'], $_POST['customerID'] )); {

$orderID = $_POST['orderID']; 
$customerID = $_POST['customerID'];

$delete = "DELETE FROM orders WHERE OrderID = '".$orderID."' AND CustomerID = '".$customerID."'";
mysqli_query($conn, $delete);
header('location: ../members.php');
}
