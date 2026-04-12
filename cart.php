<?php
include "config.php";

$cart = $_SESSION['cart'] ?? [];
$products = [];
$total = 0;

if (!empty($cart)) {
    $ids = implode(',', array_map('intval', array_keys($cart)));
    $sql = "SELECT * FROM products WHERE id IN ($ids)";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
}

if (isset($_GET['remove'])) {
    $remove_id = (int)$_GET['remove'];
    if (isset($_SESSION['cart'][$remove_id])) {
        unset($_SESSION['cart'][$remove_id]);
    }
    header("Location: cart.php");
    exit;
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart - TennisLab</title>
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
      max-width: 1100px;
      margin: auto;
      padding: 56px 32px;
    }

    .page-title {
      font-size: 48px;
      margin: 0 0 10px;
      font-weight: 800;
    }

    .page-subtitle {
      color: #5b657a;
      margin-bottom: 28px;
    }

    .cart-list {
      display: grid;
      gap: 20px;
    }

    .cart-item {
      display: grid;
      grid-template-columns: 180px 1fr auto;
      gap: 20px;
      align-items: center;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 24px;
      padding: 20px;
    }

    .cart-item img {
      width: 100%;
      height: 160px;
      object-fit: contain;
      background: #f3f3f3;
      border-radius: 16px;
    }

    .cart-name {
      font-size: 24px;
      font-weight: 800;
      margin: 0 0 8px;
    }

    .cart-desc {
      color: #5b657a;
      margin: 0 0 10px;
      line-height: 1.5;
    }

    .cart-price,
    .cart-qty {
      font-weight: 700;
      margin: 4px 0;
    }

    .remove-link {
      text-decoration: none;
      color: #b00020;
      font-weight: 700;
    }

    .cart-summary {
      margin-top: 28px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 24px;
      padding: 24px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 16px;
    }

    .total {
      font-size: 28px;
      font-weight: 800;
      margin: 0;
    }

    .button {
      display: inline-block;
      background: #071633;
      color: #fff;
      text-decoration: none;
      padding: 16px 28px;
      border-radius: 999px;
      font-weight: 700;
    }

    .empty-cart {
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 24px;
      padding: 32px;
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

    @media (max-width: 800px) {
      .cart-item {
        grid-template-columns: 1fr;
      }
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
  <h1 class="page-title">Your Cart</h1>
  <p class="page-subtitle">Review your selected items.</p>

  <?php if (!empty($products)): ?>
    <div class="cart-list">
      <?php foreach ($products as $product): ?>
        <?php
          $id = (int)$product['id'];
          $qty = (int)($cart[$id] ?? 1);
          $price = (float)product_price($product);
          $line_total = $price * $qty;
          $total += $line_total;
        ?>
        <div class="cart-item">
          <img src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">

          <div>
            <h2 class="cart-name"><?php echo h(product_name($product)); ?></h2>
            <p class="cart-desc"><?php echo h(product_description($product)); ?></p>
            <p class="cart-price">Price: $<?php echo number_format($price, 0); ?></p>
            <p class="cart-qty">Quantity: <?php echo $qty; ?></p>
          </div>

          <div>
            <p class="cart-price">$<?php echo number_format($line_total, 0); ?></p>
            <a class="remove-link" href="cart.php?remove=<?php echo $id; ?>">Remove</a>
          </div>
        </div>
      <?php endforeach; ?>
    </div>

    <div class="cart-summary">
      <p class="total">Total: $<?php echo number_format($total, 0); ?></p>
      <a class="button" href="checkout.php">Proceed to Checkout</a>
    </div>
  <?php else: ?>
    <div class="empty-cart">
      <p>Your cart is empty.</p>
      <p><a class="button" href="products.php">Shop Products</a></p>
    </div>
  <?php endif; ?>
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