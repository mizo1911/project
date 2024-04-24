<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_id BETWEEN 5 AND 8");

$stmt -> execute();

$shope_products = $stmt -> get_result();








?>