<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] !== 'kasir') {
    header("Location: login.php");
    exit;
}
?>
<?php include 'dashboard-template.php'; ?>
