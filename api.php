<?php
include "config.php";

header("Content-Type: application/json");


$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$products = [];

if ($result && $result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $products[] = [
      "id" => $row["id"],
      "title" => $row["title"],
      "price" => (float)$row["price"],
      "image" => $row["image"],
      "category" => $row["category"]
    ];
  }
}

echo json_encode($products);