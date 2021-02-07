<?php 
session_start();
//checks if the session variable has been set by the user signing in and displays a welcome message if it exists
if (isset($_SESSION['Member'])) {
echo '<p class="welcome-message">Welcome '.$_SESSION['first_name'].'<br><a href="include_files/logout.php">Logout</a></p>';
} 
?>