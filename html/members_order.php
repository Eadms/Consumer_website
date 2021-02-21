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
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
		$sql="SELECT OrderQuantity FROM orderline WHERE OrderID = "
		?>
        <header><h1 id="header" class="order-header">Product Order</h1></header>
            <table id="image-table"></table>
                <script src="../scripts/ImageTable.js"></script>
                <script> 
                    createImageSlices(imageSlice);
                    </script>
        <p>Order Item</p>
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
                <input type='text' id='productID' name='productID' value=<?php echo $queries['productID'] ?>>
            </li>
			<li>
                <input type='hidden' id='date' name='date' value=<?php echo date("y-m-d")?>>
            </li>
				<li>
                <input type='hidden' id='CustomerID' name='CustomerID' value=<?php if (isset($_SESSION['Member'])) {echo $_SESSION['customerID'];} ?>>
            </li>
            </ul>
        <button type='submit' onclick='submitOrder()'>Add to Cart</button>
        <button type="button" onclick='clearBoxes()'>Clear</button>
        <button type="button" onclick="calculation()">Calculate Total</button>
    </form>
<footer><p onclick="closeWindow()">Close window</p></footer>
</body>
</html>