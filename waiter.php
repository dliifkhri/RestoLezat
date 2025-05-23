<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] !== 'waiter') {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Waiter Panel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="logo">
    <img src="img/logo.png">
    <a href="#">Waiter Panel</a>
</div>

<div class="card full">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
    <p>Ini adalah panel waiter. Anda dapat melihat dan mengelola pesanan.</p>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
