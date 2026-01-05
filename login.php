<?php
$error = null ;
if($_SERVER['REQUEST_METOUD'] === 'POST'){
    $email = $_POST['email'] ;
    $password = $_POST['password'] ;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="public/css/style.css">
</head>
<body>

<div class="login-box">
  <h2>Login</h2>

  <?php if ($error): ?>
    <p style="color:red"><?= $error ?></p>
  <?php endif; ?>

  <form method="post">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <button class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>