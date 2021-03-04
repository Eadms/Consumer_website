<?php
session_start();
require 'database.inc.php';

unset($_SESSION['orderSuccess']);
header("location: ../members.php");
?>