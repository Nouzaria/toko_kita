<?php
    include 'service/connection.php';

    session_start();
    if (isset($_POST['logout'])) {
        session_unset();
        session_destroy();
        header('location: index.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Kita | Dashboard</title>
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css'>
    <link rel='stylesheet' href='https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap'>
    <link rel="stylesheet" href="stylesheet/style_dashboard.css">
    <link rel="stylesheet" href="stylesheet/style_dashboard-menu.css">
</head>
<body>

<!-- partial:index.partial.html -->
<nav class="sidebar close">
  <header>
    <div class="image-text">
      <span class="image">
        <img src="https://drive.google.com/uc?export=view&id=1ETZYgPpWbbBtpJnhi42_IR3vOwSOpR4z" alt="">
      </span>

      <div class="text logo-text">
        <span class="name">ADMIN</span>
      </div>
    </div>

    <i class='bx bx-chevron-right toggle'></i>
  </header>

  <div class="menu-bar">
    <div class="menu">

      <li class="search-box">
        <i class='bx bx-search icon'></i>
        <input type="text" placeholder="Search...">
      </li>

      <ul class="menu-links">
        <li class="nav-link">
          <a href="#">
            <i class='bx bx-home-alt icon'></i>
            <span class="text nav-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="#">
            <i class='bx bx-bar-chart-alt-2 icon'></i>
            <span class="text nav-text">Revenue</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="#">
            <i class='bx bx-bell icon'></i>
            <span class="text nav-text">Notifications</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="#">
            <i class='bx bx-pie-chart-alt icon'></i>
            <span class="text nav-text">Analytics</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="#">
            <i class='bx bx-heart icon'></i>
            <span class="text nav-text">Likes</span>
          </a>
        </li>

        <li class="nav-link">
          <a href="#">
            <i class='bx bx-wallet icon'></i>
            <span class="text nav-text">Wallets</span>
          </a>
        </li>

      </ul>
    </div>

    <div class="bottom-content">
      <li class="">
        <a href="index.php">
          <i class='bx bx-log-out icon'></i>
          <span class="text nav-text">Log Out</span>
        </a>
      </li>

      <li class="mode">
        <div class="sun-moon">
          <i class='bx bx-moon icon moon'></i>
          <i class='bx bx-sun icon sun'></i>
        </div>
        <span class="mode-text text">Dark mode</span>

        <div class="toggle-switch">
          <span class="switch"></span>
        </div>
      </li>

    </div>
  </div>

</nav>

<section class="home">
  <div class="text">Dashboard Sidebar</div>
  <h1>Data Logistik</h1>
    <div class="menu">
        <a href="tambah_barang.php" style="text-decoration: none; background-color: #007bff; color: white; padding: 8px 12px; border-radius: 5px;">Tambah Barang</a>
        <a href="index.php" style="text-decoration: none; background-color: #6c757d; color: white; padding: 8px 12px; border-radius: 5px;">Kembali ke Menu Utama</a>
    </div>
    
    <table>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Kategori</th>
            <th>Harga Dasar</th>
            <th>Harga Jual</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php
        $result_barang = $conn->query("SELECT * FROM tb_barang");
        if ($result_barang->num_rows > 0) {
            while($row = $result_barang->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['category']}</td>
                        <td>{$row['price']}</td>
                        <td>{$row['selling_price']}</td>
                        <td>{$row['stock']}</td>
                        <td class='action-buttons'>
                            <a href='db/edit_barang.php?id={$row['id']}' class='edit'>Edit</a>
                            <a href='db/delete_barang.php?id={$row['id']}' class='delete' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data ini?')\">Hapus</a>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>Tidak ada data barang</td></tr>";
        }
        ?>
    </table>
</section>
<!-- partial -->
  <script  src="script/script_dashboard.js"></script>

</body>
</html>

<?php
$conn->close();
?>