<?php

include('connection.php');

$stmt = $conn->prepare("SELECT * FROM products WHERE product_id BETWEEN 9 AND 12");

$stmt -> execute();

$shoes_products = $stmt -> get_result();








?>