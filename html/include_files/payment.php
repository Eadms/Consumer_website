<?php
session_start();
require 'database.inc.php';
require 'order_count.php';

$cartAmount = $_SESSION['cartAmount'];
unset($cartAmount);
header("location: ../members.php");
?>