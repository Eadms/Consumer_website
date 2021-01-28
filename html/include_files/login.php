<?php 
require "database.php";

session_start();

$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

if (isset($_POST['Username'], $_POST['password'])) {
$username = $_POST['Username'];
$pwd = $_POST['password'];
	
$sql = "SELECT * FROM members WHERE UserID = '".$username."'"; 
	$result = $pdo->prepare($sql);
	$result->execute();
	$user = $result->fetch();
	
	if(password_verify($pwd, $user['HashedPassword'])) {
		header("location:../members.php");
		exit();
	} else {
		header("location:../Member_login.php?login=error");
	}
	

	

//$dbUsername = mysqli_query($conn, "SELECT count(*) as total from members WHERE userID = '".$username."'");


//$dbPassword = (mysqli_query($conn, $sql));
		
	//if(password_verify($pwd, $dbPassword)) {
		//header("location: ../members.php?user=$username");
		//echo "Welcome $username";
	//}
}
//$rw = mysqli_fetch_array($sql);
	/*
  	if($rw['total'] < 0) {
		header("location:../Member_login.php");
		exit();
	} elseif($rw['total'] > 0) {
		header("location: ../members.php?user=$username");
		echo "Welcome $username";
	}
}
*/
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