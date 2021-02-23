<?php 
session_start();
//checks if the session variable has been set by the user signing in and displays a welcome message if it exists
if (isset($_SESSION['Member']) && isset($_SESSION['customerID'])) {
echo '<p class="welcome-message">Welcome '.$_SESSION['first_name'].'<br><a href="include_files/logout_and_database_disconnect.inc.php">Logout</a></p>';
} 
?>