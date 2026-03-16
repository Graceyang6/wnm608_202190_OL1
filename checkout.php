<?php
$pageTitle = "TennisLab — Checkout";
include 'parts/head.php';
include 'parts/header.php';
?>

<main class="section">
  <div class="container">

    <div class="section-head">
      <h1>Checkout</h1>
      <p class="muted">Enter your shipping and payment information.</p>
    </div>

    <div class="checkout-box">
      <form class="form-stack" action="confirmation.php" method="get">
        <label>
          <span>Name</span>
          <input type="text" placeholder="Grace Yang" required>
        </label>

        <label>
          <span>Email</span>
          <input type="email" placeholder="you@email.com" required>
        </label>

        <label>
          <span>Address</span>
          <input type="text" placeholder="123 Main Street" required>
        </label>

        <label>
          <span>Card Number</span>
          <input type="text" placeholder="**** **** **** 1234" required>
        </label>

        <button class="btn" type="submit">Place Order</button>
      </form>
    </div>

  </div>
</main>

<?php include 'parts/footer.php'; ?>