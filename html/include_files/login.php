<?php 
require "database.php";

$pdo = new PDO("mysql:host=localhost;dbname=bazaarceramics_db;charset=utf8","root","");

if (isset($_POST['Username'], $_POST['password'])) {
$username = $_POST['Username']; //creates variables based on the input fields
$pwd = $_POST['password'];

	
$sql = "SELECT * FROM members WHERE UserID = '".$username."'"; //selects  user record with the same username as in the input box
	$result = $pdo->prepare($sql);
	$result->execute();
	$user = $result->fetch();
	
	if(password_verify($pwd, $user['HashedPassword'])) { //decrypts the hashed password on the db and compares to the password entered into the input box
		header("location:../members.php?login=success"); //redirects the user to the members page if successful
		session_start();
		$_SESSION['Member'] = $user; //creates session variables that correspond to the username and password
		$_SESSION['password'] = $password;
		exit();
	} else {
		header("location:../Member_login.php?login=error"); //if the username/pwd doesn't match a record, an error will display based on the query string
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