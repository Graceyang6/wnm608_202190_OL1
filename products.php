<?php
include "config.php";

$sql = "SELECT * FROM products ORDER BY id ASC";
$result = $conn->query($sql);
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
  <style>
    body {
      font-family: Arial, sans-serif;
      color: #0b132b;
      background: #f7f7f7;
      margin: 0;
    }

    .site-header {
      background: #fff;
      border-bottom: 1px solid #ddd;
    }

    .nav-wrap {
      max-width: 1200px;
      margin: auto;
      padding: 24px 32px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .brand {
      font-size: 20px;
      font-weight: 700;
      color: #0b132b;
      text-decoration: none;
    }

    .nav-links {
      display: flex;
      gap: 28px;
      list-style: none;
      margin: 0;
      padding: 0;
    }

    .nav-links a {
      text-decoration: none;
      color: #0b132b;
      font-weight: 600;
    }

    .container {
      max-width: 1200px;
      margin: auto;
      padding: 56px 32px;
    }

    .page-title {
      font-size: 56px;
      margin: 0 0 12px;
      font-weight: 800;
    }

    .page-subtitle {
      font-size: 18px;
      color: #5b657a;
      margin-bottom: 36px;
    }

    .product-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 24px;
    }

    .product-card {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 24px;
      overflow: hidden;
      display: flex;
      flex-direction: column;
      min-height: 100%;
    }

    .product-card img {
      width: 100%;
      height: 320px;
      object-fit: contain;
      background: #f3f3f3;
      display: block;
    }

    .product-info {
      padding: 22px;
      display: flex;
      flex-direction: column;
      gap: 14px;
      flex: 1;
    }

    .product-name {
      font-size: 22px;
      font-weight: 800;
      margin: 0;
    }

    .product-desc {
      font-size: 16px;
      color: #5b657a;
      margin: 0;
      line-height: 1.5;
    }

    .product-bottom {
      margin-top: auto;
      display: flex;
      justify-content: space-between;
      align-items: center;
      gap: 16px;
    }

    .price {
      font-size: 18px;
      font-weight: 800;
      margin: 0;
    }

    .button {
      display: inline-block;
      background: #071633;
      color: #fff;
      text-decoration: none;
      padding: 14px 24px;
      border-radius: 999px;
      font-weight: 700;
    }

    .site-footer {
      background: #fff;
      border-top: 1px solid #ddd;
      margin-top: 56px;
    }

    .footer-wrap {
      max-width: 1200px;
      margin: auto;
      padding: 32px;
      display: flex;
      justify-content: space-between;
      gap: 24px;
      flex-wrap: wrap;
    }

    .footer-brand {
      font-size: 16px;
      font-weight: 800;
      margin-bottom: 10px;
    }

    .footer-text {
      color: #5b657a;
      margin: 0;
    }
  </style>
</head>
<body>

<header class="site-header">
  <div class="nav-wrap">
    <a class="brand" href="index.php">TennisLab</a>
    <ul class="nav-links">
      <li><a href="index.php">Home</a></li>
      <li><a href="products.php">Products</a></li>
      <li><a href="cart.php">Cart</a></li>
      <li><a href="checkout.php">Checkout</a></li>
      <li><a href="confirmation.php">Confirmation</a></li>
      <li><a href="styleguide/index.php">Style Guide</a></li>
    </ul>
  </div>
</header>

<main class="container">
  <h1 class="page-title">Products</h1>
  <p class="page-subtitle">Browse our performance tennis gear.</p>

  <div class="product-grid">
    <?php if ($result && $result->num_rows > 0): ?>
      <?php while($row = $result->fetch_assoc()): ?>
        <article class="product-card">
          <img src="images/<?php echo h(product_image($row)); ?>" alt="<?php echo h(product_name($row)); ?>">

          <div class="product-info">
            <h2 class="product-name"><?php echo h(product_name($row)); ?></h2>
            <p class="product-desc"><?php echo h(product_description($row)); ?></p>

            <div class="product-bottom">
              <p class="price">$<?php echo number_format((float)product_price($row), 0); ?></p>
              <a class="button" href="product.php?id=<?php echo (int)$row['id']; ?>">View Product</a>
            </div>
          </div>
        </article>
      <?php endwhile; ?>
    <?php else: ?>
      <p>No products found.</p>
    <?php endif; ?>
  </div>
</main>

<footer class="site-footer">
  <div class="footer-wrap">
    <div>
      <div class="footer-brand">TennisLab</div>
      <p class="footer-text">Performance tennis gear for every level.</p>
    </div>
    <p class="footer-text">© 2026 TennisLab</p>
  </div>
</footer>

</body>
</html>