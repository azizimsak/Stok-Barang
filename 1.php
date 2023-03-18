<?php
include 'koneksi.php';

// Query untuk mendapatkan jumlah produk
$sql_jumlah_produk = "SELECT COUNT(*) AS jumlah_produk FROM produk";
$result_jumlah_produk = mysqli_query($conn, $sql_jumlah_produk);
$data_jumlah_produk = mysqli_fetch_assoc($result_jumlah_produk);

// Query untuk mendapatkan persentase operator
$sql_operator = "SELECT operator, COUNT(*) AS jumlah FROM produk GROUP BY operator";
$result_operator = mysqli_query($conn, $sql_operator);
$data_operator = mysqli_fetch_all($result_operator, MYSQLI_ASSOC);

// Query untuk mendapatkan persentase kategori produk
$sql_kategori = "SELECT kategori_produk, COUNT(*) AS jumlah FROM produk GROUP BY kategori_produk";
$result_kategori = mysqli_query($conn, $sql_kategori);
$data_kategori = mysqli_fetch_all($result_kategori, MYSQLI_ASSOC);

// Query untuk mendapatkan persentase jenis sofa
$sql_jenis_sofa = "SELECT jenis_sofa, COUNT(*) AS jumlah FROM produk GROUP BY jenis_sofa";
$result_jenis_sofa = mysqli_query($conn, $sql_jenis_sofa);
$data_jenis_sofa = mysqli_fetch_all($result_jenis_sofa, MYSQLI_ASSOC);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-b4L4OFb5v5l5f5/5aXnt2XY/4/J89b4D4lmfRhPFvV1WLG5M2HhJ5O5OyPD5F5/GJhUCc0CkwZz1MeZq3siQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-+hZDRw3qavzC8drtmrhJYqwuvyN/WjQXr+i35MSeJbN5+ZIKz1j/71pWmTkqxgF0RmR/dm9RWLRBkfm0dQNHjw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body>
  <div class="container mx-auto mt-8">
    <h1 class="text-2xl font-bold mb-8">Dashboard</h1>

    <!-- Kanban Jumlah Produk -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
      <h2 class="text-lg font-bold mb-4">Jumlah Produk</h2>
      <p class="text-5xl font-bold"><?php echo $data_jumlah_produk['jumlah_produk']; ?></p>
    </div>

    <!-- Persentase Operator -->
    <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
      <h2 class="text-lg font-bold mb-4">Persentase Operator</h2>
      <canvas id="chart-operator"></canvas>
    </div>


    <!-- Script Chart Persentase Operator -->
    <script>
    var dataOperator = <?php echo json_encode($data_operator); ?>;
    var labelOperator = [];
    var jumlahOperator = [];

    for (var i = 0; i < dataOperator.length; i++) {
      labelOperator.push(dataOperator[i].operator);
      jumlahOperator.push(dataOperator[i].jumlah);
    }

    var configOperator = {
      type: 'pie',
      data: {
        labels: labelOperator,
        datasets: [{
          data: jumlahOperator,
          backgroundColor: [
            '#f59e0b',
            '#10b981',
            '#3b82f6',
            '#ef4444',
          ],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
        }
      }
    };

    var chartOperator = new Chart(
      document.getElementById('chart-operator'),
      configOperator
    );
  </script>

<!-- Persentase Kategori Produk -->
<div class="bg-white rounded-lg shadow-lg p-6 mb-8">
  <h2 class="text-lg font-bold mb-4">Persentase Kategori Produk</h2>
  <canvas id="chart-kategori"></canvas>

  <!-- Script Chart Persentase Kategori Produk -->
  <script>
    var dataKategori = <?php echo json_encode($data_kategori); ?>;
    var labelKategori = [];
    var jumlahKategori = [];

    for (var i = 0; i < dataKategori.length; i++) {
      labelKategori.push(dataKategori[i].kategori_produk);
      jumlahKategori.push(dataKategori[i].jumlah);
    }

    var configKategori = {
      type: 'pie',
      data: {
        labels: labelKategori,
        datasets: [{
          data: jumlahKategori,
          backgroundColor: [
            '#f59e0b',
            '#10b981',
            '#3b82f6',
            '#ef4444',
          ],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
        }
      }
    };

    var chartKategori = new Chart(
      document.getElementById('chart-kategori'),
      configKategori
    );
  </script>
</div>

<!-- Persentase Jenis Sofa -->
<div class="bg-white rounded-lg shadow-lg p-6 mb-8">
  <h2 class="text-lg font-bold mb-4">Persentase Jenis Sofa</h2>
  <canvas id="chart-jenis-sofa"></canvas>
  <!-- Script Chart Persentase Jenis Sofa -->
  <script>
    var dataJenisSofa = <?php echo json_encode($data_jenis_sofa); ?>;
    var labelJenisSofa = [];
    var jumlahJenisSofa = [];

    for (var i = 0; i < dataJenisSofa.length; i++) {
      labelJenisSofa.push(dataJenisSofa[i].jenis_sofa);
      jumlahJenisSofa.push(dataJenisSofa[i].jumlah);
    }

    var configJenisSofa = {
      type: 'pie',
      data: {
        labels: labelJenisSofa,
        datasets: [{
          data: jumlahJenisSofa,
          backgroundColor: [
            '#f59e0b',
            '#10b981',
            '#3b82f6',
            '#ef4444',
          ],
        }]
      },
      options: {
        responsive: true,
        plugins: {
          legend: {
            position: 'bottom',
          },
        }
      }
    };

    var chartJenisSofa = new Chart(
      document.getElementById('chart-jenis-sofa'),
      configJenisSofa
    );
  </script>
</div>
</div>
</body>
</html> 