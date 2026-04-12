<?php
session_start();

$host = "sql206.infinityfree.com";
$user = "if0_41168580";
$pass = "yangtennis123";
$dbname = "if0_41168580_products";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

function h($value) {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function product_name($row) {
    return $row['name'] ?? $row['title'] ?? $row['product_name'] ?? 'Product';
}

function product_price($row) {
    return $row['price'] ?? $row['amount'] ?? $row['product_price'] ?? 0;
}

function product_image($row) {
    return $row['image'] ?? $row['img'] ?? $row['picture'] ?? 'placeholder.jpg';
}

function product_description($row) {
    return $row['description'] ?? $row['details'] ?? $row['summary'] ?? 'Performance tennis gear.';
}
?>