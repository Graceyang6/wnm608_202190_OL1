<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $id = $_POST['id'] ?? '';
  $title = $_POST['title'];
  $price = $_POST['price'];
  $category = $_POST['category'];
  $description = $_POST['description'];
  $image = $_POST['image'];

  if ($id) {
    $stmt = $conn->prepare("UPDATE products SET title=?, price=?, category=?, description=?, image=? WHERE id=?");
    $stmt->bind_param("sdsssi", $title, $price, $category, $description, $image, $id);
  } else {
    $stmt = $conn->prepare("INSERT INTO products (title, price, category, description, image) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sdsss", $title, $price, $category, $description, $image);
  }

  $stmt->execute();

  header("Location: index.php");
  exit;
}

if (isset($_GET['delete'])) {
  $id = $_GET['delete'];

  $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  header("Location: index.php");
  exit;
}

$editProduct = null;

if (isset($_GET['edit'])) {
  $id = $_GET['edit'];

  $stmt = $conn->prepare("SELECT * FROM products WHERE id=?");
  $stmt->bind_param("i", $id);
  $stmt->execute();

  $editProduct = $stmt->get_result()->fetch_assoc();
}

$products = $conn->query("SELECT * FROM products ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Product Admin</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body class="admin-page">

  <h1 class="page-title">Product Admin</h1>
  <p class="page-subtitle">Add, edit, and delete products from the database.</p>

  <form method="POST" class="form-stack">

    <input type="hidden" name="id" value="<?= $editProduct['id'] ?? '' ?>">

    <label>
      Title
      <input type="text" name="title" required value="<?= $editProduct['title'] ?? '' ?>">
    </label>

    <label>
      Price
      <input type="number" step="0.01" name="price" required value="<?= $editProduct['price'] ?? '' ?>">
    </label>

    <label>
      Category
      <input type="text" name="category" required value="<?= $editProduct['category'] ?? '' ?>">
    </label>

    <label>
      Description
      <textarea name="description" required><?= $editProduct['description'] ?? '' ?></textarea>
    </label>

    <label>
      Image filename
      <input type="text" name="image" required value="<?= $editProduct['image'] ?? '' ?>">
    </label>

    <button type="submit" class="admin-submit-btn">
      <?= $editProduct ? 'Update Product' : 'Add Product' ?>
    </button>

  </form>

  <hr>

  <h2>All Products</h2>

  <div class="product-grid">

    <?php while ($p = $products->fetch_assoc()): ?>

      <div class="product-card">
        <img src="../images/<?= $p['image'] ?>" alt="<?= $p['title'] ?>">

        <h3><?= $p['title'] ?></h3>
        <p>$<?= $p['price'] ?></p>

        <div class="admin-actions">
          <a class="btn btn--small" href="?edit=<?= $p['id'] ?>">Edit</a>

          <a 
            class="btn btn--small" 
            href="?delete=<?= $p['id'] ?>" 
            onclick="return confirm('Delete this product?')"
          >
            Delete
          </a>
        </div>
      </div>

    <?php endwhile; ?>

  </div>

</body>
</html>