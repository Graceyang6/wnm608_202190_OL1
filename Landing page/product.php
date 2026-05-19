<?php
include "config.php";

$pageTitle = "TennisLab — Product";

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];
    $amount = isset($_POST['amount']) ? (int)$_POST['amount'] : 1;
    $option = isset($_POST['option']) ? trim($_POST['option']) : 'Standard';

    if ($amount < 1) $amount = 1;

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    $found = false;

    foreach ($_SESSION['cart'] as &$item) {
        if (
            isset($item['product_id'], $item['option']) &&
            $item['product_id'] == $product_id &&
            $item['option'] == $option
        ) {
            $item['amount'] += $amount;
            $found = true;
            break;
        }
    }
    unset($item);

    if (!$found) {
        $_SESSION['cart'][] = [
            'product_id' => $product_id,
            'amount' => $amount,
            'option' => $option
        ];
    }

    header("Location: cart.php");
    exit;
}

$sql = "SELECT * FROM products WHERE id = $id LIMIT 1";
$result = $conn->query($sql);
$product = ($result && $result->num_rows > 0) ? $result->fetch_assoc() : null;

include 'parts/head.php';
include 'parts/header.php';
?>

<main class="container">
  <a class="back-link" href="products.php">← Back to Products</a>

  <?php if ($product): ?>
    <section class="product-single">
      <div>
        <img class="main-product-image" src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">

        <div class="thumb-row">
          <img src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">
          <img src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">
          <img src="images/<?php echo h(product_image($product)); ?>" alt="<?php echo h(product_name($product)); ?>">
        </div>
      </div>

      <div>
        <h1 class="product-title"><?php echo h(product_name($product)); ?></h1>
        <p class="price">$<?php echo number_format((float)product_price($product), 2); ?></p>
        <p class="description"><?php echo h(product_description($product)); ?></p>

        <form method="post" action="product.php?id=<?php echo (int)$product['id']; ?>" class="product-form">
          <input type="hidden" name="product_id" value="<?php echo (int)$product['id']; ?>">

          <div class="form-group">
            <label for="amount">Quantity</label>
            <select name="amount" id="amount">
              <?php for ($i = 1; $i <= 10; $i++): ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
              <?php endfor; ?>
            </select>
          </div>

          <div class="form-group">
            <label for="option">Option</label>
            <select name="option" id="option">
              <option value="Blue">Blue</option>
              <option value="Black">Black</option>
              <option value="White">White</option>
            </select>
          </div>

          <button class="button" type="submit">Add to Cart</button>
        </form>
      </div>
    </section>
  <?php else: ?>
    <p>Product not found.</p>
  <?php endif; ?>
</main>

<?php include 'parts/footer.php'; ?>