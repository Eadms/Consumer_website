<?php 

$delete = "DELETE orderline.OrderID, orderline.ProductID, orderline.OrderQuantity FROM orderline INNER JOIN orders ON orders.OrderID = orderline.OrderID WHERE CustomerID = 2";
