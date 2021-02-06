<?php 
require 'database.php';
session_start();
session_destroy(); //destroys the session

if($conn) { //checks that the database is connected before closing the connection
	mysqli_close($conn); //closes the connection to the databse when the user logs out
}
header('Location:../Member_login.php');
exit;