<?php
//koneksi ke database
include 'koneksi.php';

//mengambil data dari tabel produk
$sql = "SELECT * FROM produk";
$result = mysqli_query($conn, $sql);

?>

<!-- Menampilkan data dalam bentuk kanban menggunakan Bootstrap -->
<div class="row">
  <?php while($row = mysqli_fetch_array($result)) { ?>
  <div class="col-md-4 mb-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['nama_produk']; ?></h5>
        <h6 class="card-subtitle mb-2 text-muted">
          <?php echo $row['kategori_produk']; ?>
        </h6>
        <p class="card-text">
          <?php echo $row['jumlah_produk']; ?>
          buah tersedia
        </p>
        <a href="#" class="card-link">Detail</a>
      </div>
    </div>
  </div>
  <?php } ?>
</div>

<!-- Menampilkan data dalam bentuk list menggunakan Bootstrap -->
<table class="table table-striped">
  <thead>
    <tr>
      <th>Tanggal Masuk</th>
      <th>Jam Masuk</th>
      <th>Nama Produk</th>
      <th>Kode Produk</th>
      <th>Kategori Produk</th>
      <th>Jenis Sofa</th>
      <th>Jumlah Produk</th>
      <th>Vendor</th>
      <th>Kain</th>
      <th>Warna</th>
      <th>Kaki</th>
      <th>Nama Supir</th>
      <th></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = mysqli_fetch_array($result)) { ?>
    <tr>
      <td><?php echo $row['tanggal_masuk']; ?></td>
      <td><?php echo $row['jam_masuk']; ?></td>
      <td><?php echo $row['nama_produk']; ?></td>
      <td><?php echo $row['kode_produk']; ?></td>
      <td><?php echo $row['kategori_produk']; ?></td>
      <td><?php echo $row['jenis_sofa']; ?></td>
      <td><?php echo $row['jumlah_produk']; ?></td>
      <td><?php echo $row['vendor']; ?></td>
      <td><?php echo $row['kain']; ?></td>
      <td><?php echo $row['warna']; ?></td>
      <td><?php echo $row['kaki']; ?></td>
      <td><?php echo $row['nama_supir']; ?></td>
      <td><a href="#" class="btn btn-primary btn-sm">Edit</a></td>
    </tr>
    <?php } ?>
  </tbody>
</table>

<?php
mysqli_close($conn);
?>
