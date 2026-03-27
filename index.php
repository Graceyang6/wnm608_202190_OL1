<?php
$filename = "../data/users.json";
$file = file_get_contents($filename);
$users = json_decode($file, true);


$user = $users[0];
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
    }

    .admin-wrap{
      max-width: 700px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .admin-card{
      background: #fff;
      border-radius: 16px;
      padding: 24px;
      box-shadow: 0 6px 20px rgba(0,0,0,.08);
      border: 1px solid #e5e7eb;
    }

    h1{
      margin-bottom: 20px;
    }

    .back{
      display: inline-block;
      margin-bottom: 20px;
      color: #0ea5e9;
      text-decoration: none;
      font-weight: 600;
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
  </style>
</head>

<body>

<div class="admin-wrap">
  <div class="admin-card">

    <a class="back" href="../index.php">← Back to Home</a>

    <h1>User Editor Form</h1>

    <form method="post">

      <div>
        <label>Name</label>
        <input type="text" name="name"
          value="<?= htmlspecialchars($user['name']) ?>">
      </div>

      <div>
        <label>Type</label>
        <input type="text" name="type"
          value="<?= htmlspecialchars($user['type']) ?>">
      </div>

      <div>
        <label>Email</label>
        <input type="email" name="email"
          value="<?= htmlspecialchars($user['email']) ?>">
      </div>

      <div>
        <label>Classes</label>
        <input type="text" name="classes"
          value="<?= htmlspecialchars(implode(', ', $user['classes'])) ?>">
      </div>

      <button type="submit">Save</button>

    </form>

  </div>
</div>

</body>
</html>