	<?php 
	$serverName = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "bazaarceramics_db";
	$conn = mysqli_connect($serverName, $dbusername, $dbpassword, $dbname);
	
	if(!$conn) {
		exit();
	} //defensive code which stops the php script if the connection fails
	
	if(!$conn) {
		die("Connection failed " .mysqli_connect_error()); //message which displays if the connection fails
	}
	
	?> 
</html>