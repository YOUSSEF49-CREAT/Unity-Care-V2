<?php
$user = $_SESSION['user'];
?>

<h1>Welcome <?= $user['username']; ?></h1>
<p>Role: <?= $user['role']; ?></p>

<a href="index.php?page=logout">Logout</a>
