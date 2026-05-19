<?php
include "config.php";

$pageTitle = "TennisLab — Order Confirmation";

$name = $_POST['customer_name'] ?? 'Customer';


unset($_SESSION['cart']);

include 'parts/head.php';
include 'parts/header.php';
?>

<main class="section">
  <div class="container">

    <div class="confirm-box">
      <p class="pill">Order Complete</p>
      <h1>Thank you for your purchase, <?php echo h($name); ?>.</h1>
      <p class="muted">
        Your order has been successfully placed. A confirmation email will be sent shortly.
      </p>
      <p class="muted">
        Your cart has now been cleared.
      </p>

      <div class="hero-actions">
        <a class="btn" href="index.php">Back to Home</a>
        <a class="btn btn--ghost" href="products.php">Shop More</a>
      </div>
    </div>

  </div>
</main>

<?php include 'parts/footer.php'; ?>