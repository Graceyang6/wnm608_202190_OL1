<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>TennisLab — Performance Tennis Gear</title>


  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="reset.css">
  <link rel="stylesheet" href="storetheme.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>

<header class="site-header">
  <div class="container nav">
    <a class="brand" href="#top">TennisLab</a>

    <button class="nav-toggle" aria-label="Open menu" aria-expanded="false">☰</button>

    <nav class="nav-links">
      <a href="#products">Gear</a>
      <a href="#deals">Deals</a>
      <a href="#about">About</a>
      <a href="#newsletter">Newsletter</a>
    </nav>
  </div>
</header>

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
        <a class="btn" href="#products">Shop Gear</a>
        <a class="btn btn--ghost" href="#deals">View Deals</a>
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
      <div class="feature-img"></div>
      <div class="card-body">
        <h3>Starter Bundle</h3>
        <p class="muted">Racket + balls + overgrip</p>
        <a class="link" href="#products">See bundle →</a>
      </div>
    </div>

  </div>
</section>

<section class="section" id="products">
  <div class="container">

    <div class="section-head">
      <h2>Featured Gear</h2>
      <p class="muted">Court-tested performance essentials.</p>
    </div>

    <div class="grid cards">

      <article class="card">
        <div class="thumb"></div>
        <div class="card-body">
          <h3>TL Pro 100 Racket</h3>
          <p class="muted">Balanced power with precision control.</p>
          <div class="card-row">
            <span class="price">$149</span>
            <button class="btn btn--small">Add</button>
          </div>
        </div>
      </article>

      <article class="card">
        <div class="thumb"></div>
        <div class="card-body">
          <h3>CourtSpeed Shoes</h3>
          <p class="muted">Stable support for quick movement.</p>
          <div class="card-row">
            <span class="price">$109</span>
            <button class="btn btn--small">Add</button>
          </div>
        </div>
      </article>

      <article class="card">
        <div class="thumb"></div>
        <div class="card-body">
          <h3>MatchPlay Balls (3-pack)</h3>
          <p class="muted">Consistent bounce and durable felt.</p>
          <div class="card-row">
            <span class="price">$14</span>
            <button class="btn btn--small">Add</button>
          </div>
        </div>
      </article>

    </div>
  </div>
</section>

<section class="section section--alt" id="deals">
  <div class="container">
    <div class="two-col">

      <div>
        <h2>This Week’s Lab Deal</h2>
        <p class="muted">
          Get <strong>15% off</strong> your first order with code <strong>LAB15</strong>.
          Free shipping on orders over $50.
        </p>
      </div>

      <div class="about-card">
        <h3>Starter Bundle</h3>
        <p class="muted">Bundle price: <strong>$159</strong></p>
        <a class="btn" href="#products">Shop Bundle</a>
      </div>

    </div>
  </div>
</section>

<section class="section" id="about">
  <div class="container">
    <div class="section-head">
      <h2>About TennisLab</h2>
      <p class="muted">
        We focus on performance-driven equipment selected for durability,
        balance, and match-level consistency—so you can focus on winning points.
      </p>
    </div>
  </div>
</section>

<section class="section section--alt" id="newsletter">
  <div class="container newsletter">

    <div>
      <h2>Get Drops + Discounts</h2>
      <p class="muted">
        Join our newsletter for exclusive gear releases and performance tips.
      </p>
    </div>

    <form class="form" action="#" method="post">
      <input type="email" placeholder="you@email.com" required>
      <button class="btn">Sign Up</button>
    </form>

  </div>
</section>

</main>

<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <strong>TennisLab</strong>
      <p class="muted">Performance tennis gear for every level.</p>
    </div>
    <div class="muted">© <span id="year"></span> TennisLab</div>
  </div>
</footer>

<script src="script.js"></script>

</body>
</html>