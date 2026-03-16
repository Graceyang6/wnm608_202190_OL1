<?php
$pageTitle = "TennisLab — Home";
include 'parts/head.php';
include 'parts/header.php';
?>

<main id="top">

  <section class="hero">
    <div class="container hero-grid">

      <div>
        <p class="pill">Tested • Engineered • Court-Ready</p>
        <h1>Performance gear built for your next match.</h1>
        <p class="muted">
          TennisLab curates rackets, shoes, balls, and accessories designed for control,
          speed, and durability—selected for real match play.
        </p>

        <div class="hero-actions">
          <a class="btn" href="products.php">Shop Gear</a>
          <a class="btn btn--ghost" href="products.php">View Products</a>
        </div>

        <div class="hero-stats">
          <div class="stat">
            <strong>Fast</strong>
            <span>shipping $50+</span>
          </div>
          <div class="stat">
            <strong>New</strong>
            <span>weekly drops</span>
          </div>
          <div class="stat">
            <strong>Pro</strong>
            <span>tested gear</span>
          </div>
        </div>
      </div>

      <div class="card feature">
        <img src="images/carbon-pro-racket.jpg" alt="Carbon Pro Racket">
        <div class="card-body">
          <h3>Starter Bundle</h3>
          <p class="muted">Racket + balls + overgrip</p>
          <a class="link" href="products.php">See products →</a>
        </div>
      </div>

    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <h2>Featured Gear</h2>
        <p class="muted">Court-tested performance essentials.</p>
      </div>

      <div class="grid cards">

        <article class="card">
          <img class="thumb-img" src="images/carbon-pro-racket.jpg" alt="Carbon Pro Racket">
          <div class="card-body">
            <h3>Carbon Pro Racket</h3>
            <p class="muted">Balanced power with precision control.</p>
            <div class="card-row">
              <span class="price">$199</span>
              <a class="btn btn--small" href="product.php">View</a>
            </div>
          </div>
        </article>

        <article class="card">
          <img class="thumb-img" src="images/courtspeed-shoes.jpg" alt="CourtSpeed Shoes">
          <div class="card-body">
            <h3>CourtSpeed Shoes</h3>
            <p class="muted">Stable support for quick movement.</p>
            <div class="card-row">
              <span class="price">$129</span>
              <a class="btn btn--small" href="product.php">View</a>
            </div>
          </div>
        </article>

        <article class="card">
          <img class="thumb-img" src="images/spinmax-strings.jpg" alt="SpinMax Strings">
          <div class="card-body">
            <h3>SpinMax Strings</h3>
            <p class="muted">Power, spin, and durability.</p>
            <div class="card-row">
              <span class="price">$18</span>
              <a class="btn btn--small" href="product.php">View</a>
            </div>
          </div>
        </article>

      </div>
    </div>
  </section>

</main>

<?php include 'parts/footer.php'; ?>