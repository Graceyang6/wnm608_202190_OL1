<?php
$pageTitle = "TennisLab — Product Detail";
include 'parts/head.php';
include 'parts/header.php';
?>

<main class="section">
  <div class="container">

    <div class="product-layout">
      <div class="product-media-large">
        <img src="images/carbon-pro-racket.jpg" alt="Carbon Pro Racket">
      </div>

      <div class="product-info">
        <p class="pill">Featured Product</p>
        <h1>Carbon Pro Racket</h1>
        <p class="muted">
          A performance racket designed for players who want precision, balance,
          and match-ready control.
        </p>

        <p class="price product-price-lg">$199</p>

        <ul class="product-list">
          <li>Weight: 300g</li>
          <li>Head Size: 100 sq in</li>
          <li>String Pattern: 16x19</li>
        </ul>

        <div class="hero-actions">
          <a class="btn" href="cart.php">Add to Cart</a>
          <a class="btn btn--ghost" href="products.php">Back to Products</a>
        </div>
      </div>
    </div>

  </div>
</main>

<?php include 'parts/footer.php'; ?>