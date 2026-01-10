<style>
            * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #0d6efd, #20c997);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-box {
            background: white;
            width: 350px;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.2);
            text-align: center;
        }

        .login-box h2 {
            color: #0d6efd;
            margin-bottom: 20px;
        }

        .login-box .icon {
            font-size: 50px;
            color: #20c997;
            margin-bottom: 10px;
        }

        .login-box input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-box input:focus {
            border-color: #0d6efd;
            outline: none;
        }

        .login-box button {
            width: 100%;
            padding: 10px;
            background: #0d6efd;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-box button:hover {
            background: #0b5ed7;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

</style>
<div class="login-box">
    <div class="icon">
        <i class="fa-solid fa-hospital"></i>
    </div>
    <h2>Hospital Management</h2>

    <?php if(isset($_SESSION['error'])): ?>
        <p class="error"><?= $_SESSION['error']; unset($_SESSION['error']); ?></p>
    <?php endif; ?>

    <form method="POST" action="index.php?page=login-post">
        <input type="text" name="login" placeholder="Username or Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</div>
