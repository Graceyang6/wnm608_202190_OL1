<?php
include "config.php";

$pageTitle = "TennisLab — Checkout";

$cart = $_SESSION['cart'] ?? [];
$subtotal = 0;
$tax = 0;
$total = 0;

include 'parts/head.php';
include 'parts/header.php';
?>

<main class="section">
  <div class="container">

    <div class="section-head">
      <h1>Checkout</h1>
      <p class="muted">Review your order and enter your shipping information.</p>
    </div>

    <?php if (!empty($cart)): ?>
      <div class="checkout-layout">

        <div class="checkout-box">
          <h2 class="checkout-title">Shipping & Payment</h2>

          <form class="form-stack" action="confirmation.php" method="post">
            <label>
              <span>Name</span>
              <input type="text" name="customer_name" placeholder="Grace Yang" required>
            </label>

            <label>
              <span>Email</span>
              <input type="email" name="customer_email" placeholder="you@email.com" required>
            </label>

            <label>
              <span>Address</span>
              <input type="text" name="customer_address" placeholder="123 Main Street" required>
            </label>

            <label>
              <span>Card Number</span>
              <input type="text" name="card_number" placeholder="**** **** **** 1234" required>
            </label>

            <button class="btn" type="submit">Place Order</button>
          </form>
        </div>

        <div class="checkout-box">
          <h2 class="checkout-title">Order Summary</h2>

          <div class="cart-list">
            <?php foreach ($cart as $index => $item): ?>
              <?php
                $product_id = (int)$item['product_id'];
                $qty = (int)$item['amount'];
                $option = $item['option'] ?? 'Standard';

                $sql = "SELECT * FROM products WHERE id = $product_id LIMIT 1";
                $result = $conn->query($sql);
                $product = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;

                if (!$product) continue;

                $price = (float)product_price($product);
                $line_total = $price * $qty;
                $subtotal += $line_total;
              ?>
              <div class="cart-item">
                <img src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">

                <div class="cart-info">
                  <h3 class="cart-name"><?php echo h(product_name($product)); ?></h3>
                  <p class="cart-option">Option: <?php echo h($option); ?></p>
                  <p class="cart-qty">Quantity: <?php echo $qty; ?></p>
                </div>

                <div class="cart-side">
                  <p class="cart-line-total">$<?php echo number_format($line_total, 2); ?></p>
                </div>
              </div>
            <?php endforeach; ?>
          </div>

          <?php
            $tax = $subtotal * 0.08;
            $total = $subtotal + $tax;
          ?>

          <div class="cart-summary">
            <div class="summary-lines">
              <p>Subtotal: <strong>$<?php echo number_format($subtotal, 2); ?></strong></p>
              <p>Tax: <strong>$<?php echo number_format($tax, 2); ?></strong></p>
              <p class="total">Total: $<?php echo number_format($total, 2); ?></p>
            </div>
          </div>
        </div>

      </div>
    <?php else: ?>
      <div class="empty-cart">
        <p>Your cart is empty.</p>
        <p><a class="btn" href="products.php">Shop Products</a></p>
      </div>
    <?php endif; ?>

  </div>
</main>

<?php include 'parts/footer.php'; ?>