<?php 
require "database.php";

session_start();

$serverName = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "bazaarceramics_db";
$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);



if (isset($_POST['Username'], $_POST['password'])) {
$Username = $_POST['Username'];
$pwd = $_POST['password'];

$sql = mysqli_query($conn, "SELECT count(*) as total from members WHERE userID = '".$Username."' AND HashedPassword = '".$pwd."'") or die(mysqli_error($conn));
	
$rw = mysqli_fetch_array($sql);
	
	
	if($rw['total'] > 0) {
		header("location: ../members.php");
		echo "<script>alert('Username and apssword are correct')</script>";
	}
}
/*
function uidExists($conn, $Username, $email) {
	$sql = "SELECT * FROM members WHERE UserID = ? AND HashedPassword = ?";
	$stmt = mysql_stmt_init($conn);
	header("location: location: ../Customer_login.php?login=success");
	
	if(!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: location: ../Customer_login.php?login=failure");
		exit();
	}
}
		
};
*/
?>