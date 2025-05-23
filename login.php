<?php
session_start();
include "koneksi.php";

$error = "";
$success = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = $_POST['password'];
    $level = $_POST['level'];

    $query = "SELECT * FROM users WHERE username='$username' AND level='$level' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) === 1) {
        $user = mysqli_fetch_assoc($result);

        if ($user['password'] === $password) {
            $_SESSION['user'] = $username;
            $_SESSION['level'] = $level;
            switch ($level) {
                case 'admin':
                    header("Location: admin.php");
                    break;
                case 'owner':
                    header("Location: owner.php");
                    break;
                case 'kasir':
                    header("Location: kasir.php");
                    break;
                case 'waiter':
                    header("Location: waiter.php");
                    break;
                default:
                    header("Location: index.php");
                    break;
            }
            exit;
            
        } else {
            $error = "Password salah!";
        }
    } else {
        $error = "Akun tidak ditemukan dengan kombinasi tersebut.";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>LOGIN RESTO</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="logo">
    <img src="img/logo.png" alt="Logo">
    <a href="#">Resto</a>
</div>

<div class="card">
    <div class="card-header">
        <h3 style="text-align: center;">Please Login</h3>
        <hr>
    </div>
    <div class="logo-login">
        <img src="img/logo.png" alt="Logo Login">
    </div>
    <hr>

    <?php if ($error) echo "<p style='color:red; text-align:center;'>$error</p>"; ?>

    <form method="POST">
        <label>Username:</label>
        <div class="custome-input">
            <input type="text" name="username" required>
            <i class='bx bx-user'></i>
        </div>

        <label>Password:</label>
        <div class="custome-input">
            <input type="password" name="password" required>
            <i class='bx bx-lock-alt'></i>
        </div>

        <label for="level">Level:</label>
        <div class="option">
            <select name="level" required>
                <option value="" disabled selected>Select your level</option>
                <option value="admin">Admin</option>
                <option value="owner">Owner</option>
                <option value="kasir">Kasir</option>
                <option value="waiter">Waiter</option>
            </select>
        </div>

        <button class="login">Login</button>

        <div class="links">
            <a href="#">Reset Password</a>
            <a href="#">Don't Have An Account?</a>
        </div>
    </form>
</div>

<?php if ($success): ?>
    <div style="color: green; text-align: center; font-weight: bold; margin-bottom: 10px;">
        <?= $success ?><br>
        <a href="<?= $level ?>.php" style="color: #6b43ff;">Masuk ke Dashboard</a>
    </div>
<?php endif; ?>
<div class="footer">
    <p>&copy; 2023 Resto. All rights reserved.</p>
</div>
</body>
</html>
