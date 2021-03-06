<?php
session_start();
require 'database.inc.php';

unset($_SESSION['orderSuccess']); //unsets the variable which enabled the cart amounts to be displayed, which then resets the count to 0
header("location: ../members.php");
?>