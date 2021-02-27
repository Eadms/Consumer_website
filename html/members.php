﻿<!DOCTYPE html>
<html lang="en-au" class= "member-page">
	<head>
		<meta content="text/html; charset=utf-8" http-equiv="Content-Type"><!--details of the character encoding for the page-->
		<meta name="keywords" content="ceramics, pottery, clay, bazaar ceramics, gallery"> <!--page keywords for search engines--> 
		<title>Bazaar Ceramics - Members</title> <!--page title that is displayed in the browser tab-->
		<link rel="stylesheet"  type='text/css' href="../styles/members_pages.css">
	<script src="../scripts/Form.js"></script>
	</head>
	<body class="member-body">
		<header class="content">
			<?php include 'include_files/navigation.inc.php';
			include 'include_files/banner.inc.php';
			include 'include_files/member_login_functions.inc.php';
			include 'include_files/welcome_message.inc.php';
			require 'include_files/database.inc.php';
	if(!isset($_SESSION['Member'])) {
	header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in

			?>		
			<p>amount ordered: <?php 
				
				$CustomerID = $_SESSION['customerID'];		
$todaysDate = date("Y-m-d");
$sql = "SELECT * FROM orders WHERE CustomerID = '". $CustomerID ."' AND OrderDate = '".$todaysDate."'";
if ($result = mysqli_query($conn, $sql))
  {
  // Return the number of rows in result set
  $rowcount=mysqli_num_rows($result);
  echo $rowcount;
  // Free result set
  mysqli_free_result($result);
}
				?></p><a href="cart.php">Items in Cart</a>
						
			<h1 class="member-header">Bazaar Ceramics - Members </h1><!--Page main header-->
			<h2 class="member-h2">Members Prices</h2><!--page subheader-->
		</header>
			<table style="left: -3px; top: 0px" class="member-table" class="content"><!--table which displays the sale items-->
				<tr class="member-tr">
					<th colspan="3" class="auto-style1">Discounted Items</th>
				</tr>
				<tr class="member-tr">
					<td style="width: 202px" class="member-td">
					<img src="../images/smaller/bcpot002_smaller.jpg" alt="A deep red glazed bowl with an elevated base" class='page-link' height="165" style="left: 0px; top: 0px" width="251" onclick="openWindow()"></td>
					<td class="member-td">
					<img src="../images/smaller/bcpot013_smaller.jpg" alt="A deep bowl with a white glaze on the outside and speckled green and brown earth tones on the inside of the bowl." height="156" style="left: 0px; top: 0px" width="243" class='page-link' onclick="openWindow2()"></td>
					<td style="width: 174px" class="member-td">
					<img src="../images/smaller/bcpot003_smaller.jpg" alt="a tall vase with a red glaze"  style="left: 0px; top: 0px"  class='page-link' onclick="openWindow3()"></td>
				</tr>
				<tr>
					<td>Copper Red Dish - $40</td>
					<td>White bowl - $60</td>
					<td>Copper Red Vase - $50</td>
				</tr>
				<tr>
					<td style="width: 202px">
						<img src="../images/smaller/bcpot006_smaller.jpg" alt="a small glazed light blue bowl with a brown rim and specks of brown" height="153" style="left: 0px; top: 0px" width="260" class='page-link' onclick="openWindow4()"></td>
					<td style="width: 171px">
					<img src="../images/smaller/bcpot008_smaller.jpg" alt="a tea cup and saucer that is light blue on the outside with a white rim and yellow feature design. The cup inside is dark blue" height="159" style="left: 0px; top: 0px" width="242" class='page-link' onclick="openWindow5()"></td>
					<td style="width: 174px">
					<img src="../images/smaller/bcpot009_smaller.jpg" alt="a small turquoise bowl with an elevated base" height="156" style="left: 0px; top: 0px" width="242" class='page-link' onclick="openWindow6()"></td>
				</tr>
				<tr>
					<td>Tungsten Blue Dish - $35</td>
					<td>Light Blue Cup Set - $30</td>
					<td>Cyan Dish - $40</td>
				</tr>
			</table>
	<?php 
		if(!isset($_GET['Error'])) { //checks if the query string key exists
			exit();
		} else {
			$errorCheck = $_GET['Error'];
			
			if($errorCheck == "ProductID") {
				echo "<script language='Javascript'>alert('The product ID does not exist. Please select one of the available products.');</script>";
				exit();
			} elseif($errorCheck == "zero") {
				echo "<script language='Javascript'>alert('You must select a product quantity of at least one.');</script>";
				exit();
			} elseif($errorCheck == "numerals") {
				echo "<script language='Javascript'>alert('You can only input numberals into the quantity box.');</script>";
				exit();
		}
		}
		?>
	</body>
</html>