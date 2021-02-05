<?php 
session_start();
echo '<img src="/Bazaar_Ceramics_ss/images/banner.jpg" alt="Bazaar Ceramics banner image featuring three pots" class="banner">';

if (isset($_SESSION['Member'])) {
echo '<p class="welcome-message">Welcome '.$_SESSION['first_name'].'<br><a href="include_files/logout.php">Logout</a></p>';
} 
?>