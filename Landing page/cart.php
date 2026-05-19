<?php
include "config.php";

$pageTitle = "TennisLab — Cart";

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_index'])) {
    $index = (int)$_POST['update_index'];
    $amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 1;

    if ($amount < 1) {
        $amount = 1;
    }

    if (isset($_SESSION['cart'][$index])) {
        $_SESSION['cart'][$index]['amount'] = $amount;
    }

    header("Location: cart.php");
    exit;
}


if (isset($_GET['remove'])) {
    $remove_index = (int)$_GET['remove'];

    if (isset($_SESSION['cart'][$remove_index])) {
        unset($_SESSION['cart'][$remove_index]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
    }

    header("Location: cart.php");
    exit;
}

$cart = $_SESSION['cart'];
$subtotal = 0;
$tax = 0;
$total = 0;

include 'parts/head.php';
include 'parts/header.php';
?>

<main class="container">
  <h1 class="page-title">Your Cart</h1>
  <p class="page-subtitle">Review your selected items.</p>

  <?php if (!empty($cart)): ?>
    <div class="cart-list">
      <?php foreach ($cart as $index => $item): ?>
        <?php
          $product_id = (int)$item['product_id'];
          $qty = (int)$item['amount'];
          $option = isset($item['option']) ? $item['option'] : 'Standard';

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
            <h2 class="cart-name"><?php echo h(product_name($product)); ?></h2>
            <p class="cart-desc"><?php echo h(product_description($product)); ?></p>
            <p class="cart-price">Price: $<?php echo number_format($price, 2); ?></p>
            <p class="cart-option">Option: <?php echo h($option); ?></p>

            <form method="post" action="cart.php" class="cart-update-form">
              <input type="hidden" name="update_index" value="<?php echo $index; ?>">

              <label for="amount-<?php echo $index; ?>">Quantity</label>
              <select name="amount" id="amount-<?php echo $index; ?>">
                <?php for ($i = 1; $i <= 10; $i++): ?>
                  <option value="<?php echo $i; ?>" <?php echo ($i === $qty) ? 'selected' : ''; ?>>
                    <?php echo $i; ?>
                  </option>
                <?php endfor; ?>
              </select>

              <button class="btn btn--small" type="submit">Update</button>
            </form>
          </div>

          <div class="cart-side">
            <p class="cart-line-total">$<?php echo number_format($line_total, 2); ?></p>
            <a class="remove-link" href="cart.php?remove=<?php echo $index; ?>">Remove</a>
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
      <a class="button" href="checkout.php">Proceed to Checkout</a>
    </div>
  <?php else: ?>
    <div class="empty-cart">
      <p>Your cart is empty.</p>
      <p><a class="button" href="products.php">Shop Products</a></p>
    </div>
  <?php endif; ?>
</main>

<?php include 'parts/footer.php'; ?>