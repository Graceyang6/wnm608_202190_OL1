<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TennisLab Style Guide</title>

  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">

  
  <link rel="stylesheet" href="../reset.css">
  <link rel="stylesheet" href="../storetheme.css">
  <link rel="stylesheet" href="../style.css">

  
  <link rel="stylesheet" href="styleguide.css">
</head>

<body>

<header class="site-header">
  <div class="container nav">
    <a class="brand" href="../index.php">TennisLab</a>
    <nav class="nav-links">
      <a href="../index.php">Home</a>
      <a href="../products.php">Products</a>
      <a href="./index.php">Style Guide</a>
    </nav>
  </div>
</header>

<main class="sg-main">

<section class="section">
  <div class="container">
    <h1>Style Guide</h1>
    <p class="muted">
      Design system for TennisLab: colors, typography, spacing, and components.
    </p>
  </div>
</section>


<section class="section section--alt">
  <div class="container">
    <h2>Color Palette</h2>

    <div class="sg-grid">
      <div class="sg-card">
        <div class="sg-color" style="background: var(--bg);"></div>
        <p><strong>Background</strong><br>--bg</p>
      </div>

      <div class="sg-card">
        <div class="sg-color" style="background: var(--alt);"></div>
        <p><strong>Alt</strong><br>--alt</p>
      </div>

      <div class="sg-card">
        <div class="sg-color" style="background: var(--text);"></div>
        <p><strong>Text</strong><br>--text</p>
      </div>

      <div class="sg-card">
        <div class="sg-color" style="background: var(--muted);"></div>
        <p><strong>Muted</strong><br>--muted</p>
      </div>
    </div>
  </div>
</section>


<section class="section">
  <div class="container">
    <h2>Typography</h2>

    <h1>Performance gear built for your next match.</h1>
    <h2>Featured Gear</h2>
    <h3>TL Pro 100 Racket</h3>

    <p>
      TennisLab curates rackets, shoes, balls, and accessories designed for control,
      speed, and durability—selected for real match play.
    </p>

    <p class="muted">
      This is muted helper text.
    </p>
  </div>
</section>


<section class="section section--alt">
  <div class="container">
    <h2>Iconography</h2>
    <p class="muted">Use simple outline icons with consistent stroke weight (2px). Icons inherit current text color.</p>

    <div class="sg-icon-grid">
      <!-- Cart -->
      <div class="sg-icon-card">
        <div class="sg-icon-wrap" aria-hidden="true">
          <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round">
            <path d="M6 6h15l-1.5 8.5a2 2 0 0 1-2 1.5H9a2 2 0 0 1-2-1.6L5 3H2"/>
            <circle cx="9" cy="20" r="1.5"/>
            <circle cx="18" cy="20" r="1.5"/>
          </svg>
        </div>
        <div>
          <p class="sg-icon-title">Shopping Cart</p>
          <p class="muted sg-icon-meta">24px • stroke 2px • outline</p>
        </div>
      </div>

      
      <div class="sg-icon-card">
        <div class="sg-icon-wrap" aria-hidden="true">
          <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round">
            <path d="M15 18l-6-6 6-6"/>
          </svg>
        </div>
        <div>
          <p class="sg-icon-title">Go Back</p>
          <p class="muted sg-icon-meta">24px • stroke 2px • chevron</p>
        </div>
      </div>

      
      <div class="sg-icon-card">
        <div class="sg-icon-wrap" aria-hidden="true">
          <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round">
            <path d="M20.8 4.6c-1.7-1.7-4.5-1.7-6.2 0L12 7.2l-2.6-2.6c-1.7-1.7-4.5-1.7-6.2 0s-1.7 4.5 0 6.2L12 19.6l8.8-8.8c1.7-1.7 1.7-4.5 0-6.2z"/>
          </svg>
        </div>
        <div>
          <p class="sg-icon-title">Heart / Favorite</p>
          <p class="muted sg-icon-meta">24px • stroke 2px • outline</p>
        </div>
      </div>

      
      <div class="sg-icon-card">
        <div class="sg-icon-wrap" aria-hidden="true">
          <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
               stroke-linecap="round" stroke-linejoin="round">
            <circle cx="11" cy="11" r="7"/>
            <path d="M20 20l-3.5-3.5"/>
          </svg>
        </div>
        <div>
          <p class="sg-icon-title">Search</p>
          <p class="muted sg-icon-meta">24px • stroke 2px • magnifier</p>
        </div>
      </div>
    </div>

    
    <h3 style="margin-top:30px;">Icon Buttons</h3>
    <div class="sg-row">
      <button class="sg-icon-btn" aria-label="Search">
        <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round">
          <circle cx="11" cy="11" r="7"/>
          <path d="M20 20l-3.5-3.5"/>
        </svg>
      </button>

      <button class="sg-icon-btn" aria-label="Favorite">
        <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round">
          <path d="M20.8 4.6c-1.7-1.7-4.5-1.7-6.2 0L12 7.2l-2.6-2.6c-1.7-1.7-4.5-1.7-6.2 0s-1.7 4.5 0 6.2L12 19.6l8.8-8.8c1.7-1.7 1.7-4.5 0-6.2z"/>
        </svg>
      </button>

      <button class="sg-icon-btn" aria-label="Cart">
        <svg class="sg-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round">
          <path d="M6 6h15l-1.5 8.5a2 2 0 0 1-2 1.5H9a2 2 0 0 1-2-1.6L5 3H2"/>
          <circle cx="9" cy="20" r="1.5"/>
          <circle cx="18" cy="20" r="1.5"/>
        </svg>
      </button>
    </div>
  </div>
</section>


<section class="section section--alt">
  <div class="container">
    <h2>Components</h2>

    <h3>Buttons</h3>
    <div class="sg-row">
      <a class="btn" href="#">Primary Button</a>
      <a class="btn btn--ghost" href="#">Ghost Button</a>
      <button class="btn btn--small">Small Button</button>
    </div>

    <h3 style="margin-top:30px;">Card</h3>
    <div class="card" style="max-width:350px;">
      <div class="thumb"></div>
      <div class="card-body">
        <h3>MatchPlay Balls (3-pack)</h3>
        <p class="muted">Consistent bounce and durable felt.</p>
        <div class="card-row">
          <span class="price">$14</span>
          <button class="btn btn--small">Add</button>
        </div>
      </div>
    </div>

  </div>
</section>


<section class="section">
  <div class="container">
    <h2>Sizing Tokens</h2>

    <p><strong>Radius:</strong> 16px</p>
    <div class="sg-radius-demo"></div>

    <p style="margin-top:20px;"><strong>Shadow:</strong></p>
    <div class="sg-shadow-demo"></div>
  </div>
</section>

</main>

<footer class="site-footer">
  <div class="container footer-grid">
    <div>
      <strong>TennisLab</strong>
      <p class="muted">Style Guide Page</p>
    </div>
  </div>
</footer>

</body>
</html>