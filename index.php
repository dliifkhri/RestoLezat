<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard | Resto</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="card" style="width: 600px; text-align: center;">
    <h2>Selamat Datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h2>
    <p>Anda login sebagai <strong><?= $_SESSION['level'] ?></strong>.</p>
    <div style="margin-top: 20px;">
        <?php if ($_SESSION['level'] === 'admin'): ?>
            <a href="admin.php">Kelola Admin</a><br>
        <?php endif; ?>

        <?php if ($_SESSION['level'] === 'owner'): ?>
            <a href="owner.php">Laporan Owner</a><br>
        <?php endif; ?>
        <?php if ($_SESSION['level'] === 'waiter'): ?>
            <a href="waiter.php">Lihat Pesanan</a><br>
        <?php endif; ?>
        <?php if ($_SESSION['level'] === 'kasir'): ?>
            <a href="kasir.php">Transaksi Pembayaran</a><br>
        <?php endif; ?>

        <a href="logout.php" style="display: inline-block; margin-top: 20px; color: red;">Logout</a>
    </div>
</div>
</body>
</html>
