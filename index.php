<?php
$filename = "../data/users.json";
$file = file_get_contents($filename);
$users = json_decode($file, true);

$selectedIndex = isset($_GET['user']) ? (int)$_GET['user'] : 0;

if ($selectedIndex < 0 || $selectedIndex >= count($users)) {
  $selectedIndex = 0;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $editIndex = (int)$_POST["user_index"];

  if ($editIndex >= 0 && $editIndex < count($users)) {
    $users[$editIndex]["name"] = trim($_POST["name"]);
    $users[$editIndex]["type"] = trim($_POST["type"]);
    $users[$editIndex]["email"] = trim($_POST["email"]);

    $classes = array_map('trim', explode(',', $_POST["classes"]));
    $classes = array_filter($classes, fn($value) => $value !== '');
    $classes = array_map('intval', $classes);

    $users[$editIndex]["classes"] = $classes;

    file_put_contents($filename, json_encode($users, JSON_PRETTY_PRINT));

    $selectedIndex = $editIndex;
  }
}

$user = $users[$selectedIndex];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>User Admin</title>

  <link rel="stylesheet" href="../reset.css">
  <link rel="stylesheet" href="../storetheme.css">
  <link rel="stylesheet" href="../style.css">

  <style>
    body{
      padding-bottom: 4rem;
      background: #f8fafc;
    }

    .admin-wrap{
      max-width: 1100px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .back{
      display: inline-block;
      margin-bottom: 20px;
      color: #0ea5e9;
      text-decoration: none;
      font-weight: 600;
    }

    .admin-layout{
      display: grid;
      grid-template-columns: 320px 1fr;
      gap: 24px;
      align-items: start;
    }

    .admin-card{
      background: #fff;
      border-radius: 16px;
      padding: 24px;
      box-shadow: 0 6px 20px rgba(0,0,0,.08);
      border: 1px solid #e5e7eb;
    }

    h1, h2{
      margin-bottom: 16px;
    }

    .user-list{
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      gap: 12px;
    }

    .user-list a{
      display: block;
      padding: 14px 16px;
      border: 1px solid #d1d5db;
      border-radius: 12px;
      text-decoration: none;
      color: #111827;
      background: #fff;
    }

    .user-list a:hover,
    .user-list a.active{
      border-color: #22c55e;
      background: #f0fdf4;
    }

    .user-meta{
      color: #6b7280;
      font-size: 14px;
      margin-top: 4px;
    }

    form{
      display: grid;
      gap: 14px;
    }

    label{
      font-weight: 600;
      margin-bottom: 4px;
      display: block;
    }

    input{
      width: 100%;
      padding: 10px 12px;
      border-radius: 8px;
      border: 1px solid #d1d5db;
      font: inherit;
    }

    button{
      margin-top: 10px;
      padding: 12px 18px;
      background: #22c55e;
      color: white;
      border: none;
      border-radius: 10px;
      font-weight: 700;
      cursor: pointer;
    }

    button:hover{
      opacity: 0.9;
    }

    .success{
      margin-bottom: 16px;
      padding: 12px 14px;
      border-radius: 10px;
      background: #ecfdf5;
      color: #166534;
      border: 1px solid #bbf7d0;
      font-weight: 600;
    }

    @media (max-width: 800px){
      .admin-layout{
        grid-template-columns: 1fr;
      }
    }
  </style>
</head>

<body>

<div class="admin-wrap">
  <a class="back" href="../index.php">← Back to Home</a>

  <div class="admin-layout">
    
    <div class="admin-card">
      <h2>User List</h2>
      <ul class="user-list">
        <?php foreach($users as $index => $item): ?>
          <li>
            <a href="index.php?user=<?= $index; ?>" class="<?= $index === $selectedIndex ? 'active' : ''; ?>">
              <strong><?= htmlspecialchars($item['name']); ?></strong>
              <div class="user-meta">
                <?= htmlspecialchars($item['type']); ?><br>
                <?= htmlspecialchars($item['email']); ?>
              </div>
            </a>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

    <div class="admin-card">
      <h1>User Editor Form</h1>

      <?php if ($_SERVER["REQUEST_METHOD"] === "POST"): ?>
        <div class="success">User updated successfully.</div>
      <?php endif; ?>

      <form method="post">
        <input type="hidden" name="user_index" value="<?= $selectedIndex; ?>">

        <div>
          <label for="name">Name</label>
          <input id="name" type="text" name="name" value="<?= htmlspecialchars($user['name']); ?>">
        </div>

        <div>
          <label for="type">Type</label>
          <input id="type" type="text" name="type" value="<?= htmlspecialchars($user['type']); ?>">
        </div>

        <div>
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="<?= htmlspecialchars($user['email']); ?>">
        </div>

        <div>
          <label for="classes">Classes</label>
          <input id="classes" type="text" name="classes" value="<?= htmlspecialchars(implode(', ', $user['classes'])); ?>">
        </div>

        <button type="submit">Save Changes</button>
      </form>
    </div>

  </div>
</div>

</body>
</html>