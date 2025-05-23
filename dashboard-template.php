<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard <?= ucfirst($_SESSION['level']) ?></title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css"/>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap');
    * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    font-family: 'Segoe UI', sans-serif;
  }

  body {
    display: flex;
    height: 100vh;
    background: #f4f6f9;
    background: linear-gradient(to right, #e2e2e2, #c9d6ff);
  }
  .logo {
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 5px;
  }
  .logo img {
    width: 60px;
    height: auto;
    margin-right: 10px;
  }
  .logo h2 {
    margin-bottom: 10px;
    font-size: 24px;
    color: #ffff;
    text-decoration: none;
  }

  .sidebar {
    width: 240px;
    background-color: #2f3542;
    color: #fff;
    display: flex;
    flex-direction: column;
    padding: 20px;
  }

  .sidebar h2 {
    text-align: center;
    margin-bottom: 30px;
  }

  .sidebar a {
    color: #fff;
    text-decoration: none;
    padding: 12px 20px;
    margin: 5px 0;
    border-radius: 8px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background 0.3s;
  }

  .sidebar a:hover {
    background-color: #57606f;
  }

  .content {
    flex: 1;
    padding: 30px;
    overflow-y: auto;
  }

  .section {
    display: none;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }

  .section.active {
    display: block;
  }

  .chart-container {
    width: 100%;
    max-width: 600px;
    margin-top: 20px;
  }

  form label {
    display: block;
    margin-top: 15px;
    font-weight: bold;
  }

  form input {
    width: 100%;
    padding: 10px;
    margin-top: 5px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  form button {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #1e90ff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  @media (max-width: 768px) {
    body {
      flex-direction: column;
    }

    .sidebar {
      width: 100%;
      flex-direction: row;
      justify-content: space-around;
      padding: 10px;
    }

    .sidebar a {
      padding: 10px;
      font-size: 14px;
    }

    .content {
      padding: 20px;
    }
  }
  </style>
</head>
<body>
  <div class="sidebar">
    <div class="logo">
      <img src="img/logo.png" alt="Logo" style="width: 60px; height: auto;">
    <h2>RestoLezat</h2>
    </div>
    <a href="#" onclick="showSection('home')"><i class="fas fa-home"></i> Beranda</a>
    <a href="#" onclick="showSection('data')"><i class="fas fa-chart-bar"></i> Data</a>
    <a href="#" onclick="showSection('profile')"><i class="fas fa-user"></i> Profil</a>
    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
  </div>

  <div class="content">
    <div id="home" class="section active">
      <h1>Selamat Datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h1>
      <p>Anda login sebagai <strong><?= $_SESSION['level'] ?></strong>.</p>
    </div>

    <div id="data" class="section">
      <h1>Data</h1>
      <p>Berikut adalah grafik data bulanan:</p>
      <div class="chart-container">
        <canvas id="dataChart"></canvas>
      </div>
    </div>

    <div id="profile" class="section">
      <h1>Profil Pengguna</h1>
      <form>
        <label for="name">Nama Lengkap</label>
        <input type="text" id="name" value="<?= htmlspecialchars($_SESSION['user']) ?>">

        <label for="email">Email</label>
        <input type="email" id="email" value="">

        <label for="password">Kata Sandi</label>
        <input type="password" id="password" placeholder="••••••••">

        <button type="submit">Simpan Perubahan</button>
      </form>
    </div>
  </div>

  <script>
    function showSection(id) {
      document.querySelectorAll('.section').forEach(sec => {
        sec.classList.remove('active');
      });
      document.getElementById(id).classList.add('active');
    }

    // Chart.js
    const ctx = document.getElementById('dataChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
        datasets: [{
          label: 'Data Penjualan',
          data: [12, 19, 3, 5, 2, 7],
          backgroundColor: 'rgba(30, 144, 255, 0.6)',
          borderColor: 'rgba(30, 144, 255, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: { beginAtZero: true }
        }
      }
    });
  </script>
</body>
</html>
