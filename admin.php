<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] !== 'admin') {
    header("Location: index.php");
    exit;
}
?>
<?php include 'dashboard-template.php'; ?>