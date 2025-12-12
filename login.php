<?php
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    // check against session-stored signup credentials
    if (isset($_SESSION['saved_email']) && $email === $_SESSION['saved_email'] && $password === $_SESSION['saved_pass']) {
        // set active username in session (temporary only)
        $_SESSION['username'] = $_SESSION['saved_name'] ?? 'User';
        header('Location: index.php');
        exit();
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Login - BucksBuddy</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header class="navbar">
    <div class="logo">BucksBuddy</div>
    <nav><ul><li><a href="index.php">Home</a></li></ul></nav>
  </header>

  <div class="auth-container">
    <div class="auth-box">
      <h2>Login to BucksBuddy</h2>

      <?php if($error): ?>
        <p class="error"><?php echo htmlspecialchars($error); ?></p>
      <?php endif; ?>

      <form method="POST" class="auth-form">
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Login</button>
      </form>

      <p class="small">Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
  </div>

  <footer class="footer"><div>© BucksBuddy</div></footer>
</body>
</html>