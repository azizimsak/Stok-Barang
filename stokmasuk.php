<?php
include 'koneksi.php';

//mengambil nilai dari form
$tanggal_masuk = $_POST['date'];
$jam_masuk = $_POST['jam-masuk'];
$nama_produk = $_POST['product-name'];
$kode_produk = $_POST['product-code'];
$kategori_produk = $_POST['product-category'];
$jenis_sofa = $_POST['jenis-sofa'];
$jumlah_produk = $_POST['product-qty'];
$vendor = $_POST['supplier-name'];
$kain = $_POST['product-fabric'];
$warna = $_POST['product-color'];
$kaki = $_POST['product-legs'];
$nama_supir = $_POST['driver-name'];

//mengirim data ke database
$sql = "INSERT INTO produk (tanggal_masuk, jam_masuk, nama_produk, kode_produk, kategori_produk, jenis_sofa, jumlah_produk, vendor, kain, warna, kaki, nama_supir)
VALUES ('$tanggal_masuk', '$jam_masuk', '$nama_produk', '$kode_produk', '$kategori_produk', '$jenis_sofa', '$jumlah_produk', '$vendor', '$kain', '$warna', '$kaki', '$nama_supir')";

if (mysqli_query($conn, $sql)) {
  echo "<script>alert('Data berhasil disimpan');</script>";
} else {
  echo "<script>alert('Data gagal disimpan');</script>";
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
