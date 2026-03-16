<?php
$pageTitle = "TennisLab — Cart";
include 'parts/head.php';
include 'parts/header.php';
?>

<main class="section">
  <div class="container">

    <div class="section-head">
      <h1>Cart Review</h1>
      <p class="muted">Review your selected items before checkout.</p>
    </div>

    <div class="cart-box">
      <div class="cart-item">
        <div>
          <h3>Carbon Pro Racket</h3>
          <p class="muted">1 item</p>
        </div>
        <div class="price">$199</div>
      </div>

      <div class="cart-item">
        <div>
          <h3>SpinMax Strings</h3>
          <p class="muted">1 item</p>
        </div>
        <div class="price">$18</div>
      </div>

      <div class="cart-total">
        <strong>Total</strong>
        <strong>$217</strong>
      </div>

      <div class="hero-actions">
        <a class="btn" href="checkout.php">Proceed to Checkout</a>
        <a class="btn btn--ghost" href="products.php">Continue Shopping</a>
      </div>
    </div>

  </div>
</main>

<?php include 'parts/footer.php'; ?>