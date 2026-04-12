<?php
include "config.php";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (!isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = 1;
    } else {
        $_SESSION['cart'][$product_id]++;
    }

    header("Location: cart.php");
    exit;
}

$sql = "SELECT * FROM products WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$product = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product - TennisLab</title>
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

    .product-single {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 32px;
      background: #fff;
      border: 1px solid #ddd;
      border-radius: 24px;
      padding: 32px;
    }

    .product-single img {
      width: 100%;
      height: 520px;
      object-fit: contain;
      background: #f3f3f3;
      border-radius: 20px;
    }

    .product-title {
      font-size: 48px;
      line-height: 1.1;
      margin: 0 0 16px;
      font-weight: 800;
    }

    .price {
      font-size: 30px;
      font-weight: 800;
      margin: 0 0 20px;
    }

    .description {
      font-size: 18px;
      color: #5b657a;
      line-height: 1.7;
      margin-bottom: 28px;
    }

    .button {
      border: 0;
      background: #071633;
      color: #fff;
      padding: 16px 28px;
      border-radius: 999px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
    }

    .back-link {
      display: inline-block;
      margin-bottom: 24px;
      text-decoration: none;
      color: #0b132b;
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

    @media (max-width: 800px) {
      .product-single {
        grid-template-columns: 1fr;
      }

      .product-single img {
        height: 360px;
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
  <a class="back-link" href="products.php">← Back to Products</a>

  <?php if ($product): ?>
    <section class="product-single">
      <div>
        <img src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">
      </div>

      <div>
        <h1 class="product-title"><?php echo h(product_name($product)); ?></h1>
        <p class="price">$<?php echo number_format((float)product_price($product), 0); ?></p>
        <p class="description"><?php echo h(product_description($product)); ?></p>

        <form method="post" action="product.php?id=<?php echo (int)$product['id']; ?>">
          <input type="hidden" name="product_id" value="<?php echo (int)$product['id']; ?>">
          <button class="button" type="submit">Add to Cart</button>
        </form>
      </div>
    </section>
  <?php else: ?>
    <p>Product not found.</p>
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