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

// Query untuk mendapatkan persentase kain
$sql_kain = "SELECT kain, COUNT(*) AS jumlah FROM produk GROUP BY kain";
$result_kain = mysqli_query($conn, $sql_kain);
$data_kain = mysqli_fetch_all($result_kain, MYSQLI_ASSOC);

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" integrity="sha512-b4L4OFb5v5l5f5/5aXnt2XY/4/J89b4D4lmfRhPFvV1WLG5M2HhJ5O5OyPD5F5/GJhUCc0CkwZz1MeZq3siQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
      <?php foreach ($data_operator as $operator) {?>
        <div class="flex items-center justify-between mb-4">
        <p><?php echo $operator['operator']; ?></p>
        <p class="font-bold"><?php echo number_format(($operator['jumlah']/$data_jumlah_produk['jumlah_produk'])*100, 2); ?>%</p>
        </div>
        <?php } ?>
        </div>
        <!-- Persentase Kategori Produk -->
<div class="bg-white rounded-lg shadow-lg p-6 mb-8">
    <h2 class="text-lg font-bold mb-4">Persentase Kategori Produk</h2>
    <?php foreach ($data_kategori as $kategori) { ?>
    <div class="flex items-center justify-between mb-4">
      <p><?php echo $kategori['kategori_produk']; ?></p>
      <p class="font-bold"><?php echo number_format(($kategori['jumlah']/$data_jumlah_produk['jumlah_produk'])*100, 2); ?>%</p>
    </div>
    <?php } ?>
  </div>
  
  <!-- Persentase Jenis Sofa -->
  <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
    <h2 class="text-lg font-bold mb-4">Persentase Jenis Sofa</h2>
    <?php foreach ($data_jenis_sofa as $jenis_sofa) { ?>
    <div class="flex items-center justify-between mb-4">
      <p><?php echo $jenis_sofa['jenis_sofa']; ?></p>
      <p class="font-bold"><?php echo number_format(($jenis_sofa['jumlah']/$data_jumlah_produk['jumlah_produk'])*100, 2); ?>%</p>
    </div>
    <?php } ?>
  </div>
  
  <!-- Persentase Kain -->
  <div class="bg-white rounded-lg shadow-lg p-6 mb-8">
    <h2 class="text-lg font-bold mb-4">Persentase Kain</h2>
    <?php foreach ($data_kain as $kain) { ?>
    <div class="flex items-center justify-between mb-4">
      <p><?php echo $kain['kain']; ?></p>
      <p class="font-bold"><?php echo number_format(($kain['jumlah']/$data_jumlah_produk['jumlah_produk'])*100, 2); ?>%</p>
    </div>
    <?php } ?>
  </div>
</div>
</body>
</html>




  