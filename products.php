<?php
include "config.php";
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Products - TennisLab</title>

  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="storetheme.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="site-header">
  <div class="nav-wrap">
    <a class="brand" href="index.php">TennisLab</a>

    <button class="nav-toggle">☰</button>

    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li>
        <a href="cart.php">
          Cart (<span id="cart-count">0</span>)
        </a>
      </li>
    </ul>
  </div>
</header>

<main class="container">
  <h1 class="page-title">Products</h1>
  <p class="page-subtitle">Search, filter, and sort TennisLab gear.</p>

  <section class="product-controls">

    <input 
      type="search" 
      id="search-input" 
      placeholder="Search products..."
      class="search-input"
    >

    <div class="filter-buttons">
      <button class="filter-btn active" data-filter="all">All</button>
      <button class="filter-btn" data-filter="equipment">Equipment</button>
      <button class="filter-btn" data-filter="accessories">Accessories</button>
      <button class="filter-btn" data-filter="apparel">Apparel</button>
    </div>

    <select id="sort-select" class="sort-select">
      <option value="default">Sort Products</option>
      <option value="low">Price: Low to High</option>
      <option value="high">Price: High to Low</option>
      <option value="az">Name: A to Z</option>
      <option value="za">Name: Z to A</option>
    </select>

  </section>

  <div class="product-grid" id="product-list">
    <p>Loading products...</p>
  </div>
</main>

<footer class="site-footer">
  <div class="footer-wrap">
    <div>
      <div class="footer-brand">TennisLab</div>
      <p class="footer-text">Performance tennis gear for every level.</p>
    </div>
    <p class="footer-text">© <span id="year"></span> TennisLab</p>
  </div>
</footer>

<script src="script.js"></script>

</body>
</html>