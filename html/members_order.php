<!DOCTYPE html>
<html lang="en-au">
    <head>
            <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
            <link rel="stylesheet"  type='text/css' href="../styles/order_page.css">
        <script src="../scripts/Form.js"></script>
        <title>Product Order Form</title> 
    </head>
    <body>
       <?php include 'include_files/Navigation.inc.php'; 
             include 'include_files/Banner.inc.php';
		include 'include_files/Welcome_message.inc.php';
		include 'include_files/shopping_cart_functions.php';
		
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);	
		?>
        <header><h1 id="header" class="order-header">Product Order</h1></header>
            <table id="image-table"></table>
                <script src="../scripts/ImageTable.js"></script>
                <script> 
                    createImageSlices(imageSlice);
                    </script>
    <form method="post" action="include_files/shopping_cart_functions.php">
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
                <input type='hidden' id='ProductID' name='ProductID' value=<?php $queries['productID'] ?>>
            </li>
            </ul>
        <button type='submit' onclick='submitOrder()'>Add to Cart</button>
        <button type="button" onclick='clearBoxes()'>Clear</button>
        <button type="button" onclick="calculation()">Calculate Total</button>
    </form>
<footer><p onclick="closeWindow()">Close window</p></footer>
</body>
</html>