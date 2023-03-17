<?php
//koneksi ke database
include 'koneksi.php';

//mengambil data dari tabel produk
$sql = "SELECT * FROM produk";
$result = mysqli_query($conn, $sql);

//menampilkan data dalam tabel HTML
echo "<table border='1'>
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
</tr>";

while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['tanggal_masuk'] . "</td>";
  echo "<td>" . $row['jam_masuk'] . "</td>";
  echo "<td>" . $row['nama_produk'] . "</td>";
  echo "<td>" . $row['kode_produk'] . "</td>";
  echo "<td>" . $row['kategori_produk'] . "</td>";
  echo "<td>" . $row['jenis_sofa'] . "</td>";
  echo "<td>" . $row['jumlah_produk'] . "</td>";
  echo "<td>" . $row['vendor'] . "</td>";
  echo "<td>" . $row['kain'] . "</td>";
  echo "<td>" . $row['warna'] . "</td>";
  echo "<td>" . $row['kaki'] . "</td>";
  echo "<td>" . $row['nama_supir'] . "</td>";
  echo "</tr>";
}
echo "</table>";

mysqli_close($conn);
?>
