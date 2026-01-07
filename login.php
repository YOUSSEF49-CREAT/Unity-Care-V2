<?php
$error = null ;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '' ;

    if (AuthController::login($email, $password)) {
        header('Location: index.php?page=dashboard');
        exit;
    } else {
        $error = "Invalid credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="public/css/style.css">
  <style>
  
    * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

/* Background */
body {
  height: 100vh;
  background: linear-gradient(135deg, #0f4c75, #1eb2a6);
  display: flex;
  align-items: center;
  justify-content: center;
}

/* Login Box */
.login-box {
  background: #ffffff;
  padding: 35px 30px;
  width: 360px;
  border-radius: 12px;
  box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
  text-align: center;
}

/* Title */
.login-box h2 {
  margin-bottom: 25px;
  color: #0f4c75;
  font-weight: 600;
}

/* Inputs */
.login-box input {
  width: 100%;
  padding: 12px 15px;
  margin-bottom: 15px;
  border-radius: 8px;
  border: 1px solid #ddd;
  font-size: 15px;
  transition: 0.3s;
}

.login-box input:focus {
  border-color: #1eb2a6;
  outline: none;
  box-shadow: 0 0 0 3px rgba(30, 178, 166, 0.2);
}

/* Button */
.login-box button {
  width: 100%;
  padding: 12px;
  border: none;
  border-radius: 8px;
  background: #1eb2a6;
  color: #ffffff;
  font-size: 16px;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s;
}

.login-box button:hover {
  background: #159a8c;
}

/* Error message */
.login-box p {
  margin-bottom: 15px;
  font-size: 14px;
}

/* Small screen */
@media (max-width: 400px) {
  .login-box {
    width: 90%;
  }
}

  </style>
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
    <button  class="btn btn-primary">Login</button>
  </form>
</div>

</body>
</html>