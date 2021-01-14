<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>
	<?php 
	//error_reporting(0); //defensive code which hides any error message if the database doesn't connect
	$serverName = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bazaarceramics_db";
	$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);
	
	//if(!$conn) {
		//exit();
	//} //defensive code which stops the php script if the connection fails
	
	if(!$conn) {
		die("Connection failed: " .mysqli_connect_error());
	}
	
	?> 
</html>