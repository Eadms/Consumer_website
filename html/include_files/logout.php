<?php 
session_start();
session_destroy();
header('Location:../Member_login.php');
exit;