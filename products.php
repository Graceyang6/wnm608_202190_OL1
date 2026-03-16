<?php
$pageTitle = "TennisLab — Products";
include 'parts/head.php';
include 'parts/header.php';
?>

<main class="section">
  <div class="container">

    <div class="section-head">
      <h1>Products</h1>
      <p class="muted">Browse our performance tennis gear.</p>
    </div>

    <div class="grid cards">

      <article class="card">
        <img class="thumb-img" src="images/carbon-pro-racket.jpg" alt="Carbon Pro Racket">
        <div class="card-body">
          <h3>Carbon Pro Racket</h3>
          <p class="muted">Control • 300g • 16x19</p>
          <div class="card-row">
            <span class="price">$199</span>
            <a class="btn btn--small" href="product.php">View Product</a>
          </div>
        </div>
      </article>

      <article class="card">
        <img class="thumb-img" src="images/courtspeed-shoes.jpg" alt="CourtSpeed Shoes">
        <div class="card-body">
          <h3>CourtSpeed Shoes</h3>
          <p class="muted">Stability • Cushion • Grip</p>
          <div class="card-row">
            <span class="price">$129</span>
            <a class="btn btn--small" href="product.php">View Product</a>
          </div>
        </div>
      </article>

      <article class="card">
        <img class="thumb-img" src="images/spinmax-strings.jpg" alt="SpinMax Strings">
        <div class="card-body">
          <h3>SpinMax Strings</h3>
          <p class="muted">Spin • Power • Durability</p>
          <div class="card-row">
            <span class="price">$18</span>
            <a class="btn btn--small" href="product.php">View Product</a>
          </div>
        </div>
      </article>

    </div>

  </div>
</main>

<?php include 'parts/footer.php'; ?>