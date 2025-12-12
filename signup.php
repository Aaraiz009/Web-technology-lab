<?php
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if ($name === '' || $email === '' || $password === '') {
        $error = "All fields are required.";
    } else {
        // Save credentials only in session (temporary). No file, no DB.
        $_SESSION['saved_name'] = $name;
        $_SESSION['saved_email'] = $email;
        $_SESSION['saved_pass'] = $password;

        // Redirect to login
        header('Location: login.php');
        exit();
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Sign Up - BucksBuddy</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="navbar">
    <div class="logo">BucksBuddy</div>
    <nav><ul><li><a href="index.php">Home</a></li></ul></nav>
  </header>

  <div class="auth-container">
    <div class="auth-box">
      <h2>Create your BucksBuddy account</h2>

      <?php if($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
      <?php endif; ?>

      <form method="POST" class="auth-form">
        <input type="text" name="name" placeholder="Full Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Sign Up</button>
      </form>

      <p class="small">Already have an account? <a href="login.php">Login</a></p>
    </div>
  </div>

  <footer class="footer"><div>© BucksBuddy</div></footer>
</body>
</html>