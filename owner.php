<?php

session_start();
if (!isset($_SESSION['user']) || $_SESSION['level'] !== 'owner') {
    header("Location: login.php");
    exit;
}
?>
<?php include 'dashboard-template.php'; ?>