<!DOCTYPE html>
<html lang="en-au">
    <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
            <link rel="stylesheet"  type='text/css' href="../styles/order_page.css">
        <script src="../scripts/Form.js"></script>
        <title>Product Order Form</title> 
    </head>
    <body>
       <?php include 'include_files/navigation.inc.php'; 
             include 'include_files/banner.inc.php';
			include 'include_files/welcome_message.inc.php';
			include 'include_files/shopping_cart_functions.php';
			require 'include_files/database.inc.php';
			require 'include_files/order_count.php';

if(!isset($_SESSION['Member'])) {
header("location: Member_login.php?login=notloggedin");} //redirects user if they are not logged in

		
date_default_timezone_set('Australia/Sydney'); //sets the timezone
$todaysDate = date("Y-m-d"); //retrieves today's date

//retrives order information if the customer has already added something to the cart
$productCheck = "SELECT * FROM orders where CustomerID = '".$_SESSION['customerID']."' AND OrderDate = '".$todaysDate."'";	
$result = $pdo->prepare($productCheck);
$result->execute();
$dbproduct = $result->fetch();
	
//retrieves the information contained in the query string and puts it into an array for use in the order form
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);	?>
        
		<header><h1 id="header" class="order-header">Product Order</h1></header>
            <table id="image-table"></table>
                <script src="../scripts/ImageTable.js"></script>
                <script> 
                    createImageSlices(imageSlice);
                    </script>
        <p class='form-header'>Order Item</p>
		<form action="include_files/shopping_cart_functions.php" method="post">
            <ul>
            <li>
                <label for ="item">Item Description</label>
                <input type="text" id='item' name='item_description'>
            </li>
            <li>
                <label for='quantity'>Quantity</label>
                <input type='text' id="quantity" name="quantity" value='1'>
            </li>
            <li>
                <label for='cost'>Price</label>
                <input type='text' id='cost' name="cost">
            </li>
            <li>
                <label for='total-price'>Total Price</label>
                <input type='text' id='total-price' name='total-price'>
            </li>
			<li>
				<label for='productID'>Product ID</label>
                <input type='text' id='productID' name='productID' value=<?php echo $queries['productID'] ?>><!--retries the productID from the query string and prints it-->
            </li>
			<li>
                <input type='hidden' id='date' name='date' value=<?php echo $todaysDate?>><!-- Hidden field which prints the date so it can be easily retrived on the next page -->
            </li>
				<li>
                <input type='hidden' id='CustomerID' name='CustomerID' value=<?php if (isset($_SESSION['Member'])) {echo $_SESSION['customerID'];} ?>> <!-- prints the customerID so it can be retrived which the rest of the order information-->
            </li>
				<li>
                <input type='hidden' id='orderID' name='orderID' value='<?php if(isset($dbproduct['OrderDate'])) { echo $dbproduct['OrderID'];} else {echo "";} ?>'><!-- checks an orderID exists based on order date column (only exists if customer has already added to the cart) If it extists, it prints the OrderID  -->
            </li>
            </ul>
        <button type='submit' onclick='submitOrder()'>Add to Cart</button>
        <button type="button" onclick='clearBoxes()'>Clear</button>
        <button type="button" onclick="calculation()">Calculate Total</button>
    </form>
<footer><p onclick="closeWindow()">Close window</p></footer>
</body>
</html>