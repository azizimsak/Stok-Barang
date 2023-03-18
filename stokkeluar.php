<?php
include 'koneksi.php';

//mengambil nilai dari form
$operator = $_POST['operator'];
$tanggal = $_POST['date'];
$jam_keluar = $_POST['jam-keluar'];
$id_produk = $_POST['nama_produk'];
$jenis_sofa = $_POST['jenis_sofa'];
$pilihan_kain = $_POST['pilihan_kain'];
$warna = $_POST['warna'];
$type_dudukan = $_POST['type_dudukan'];
$kaki = $_POST['kaki'];
$jumlah = $_POST['jumlah'];
$nama_supir = $_POST['supir-name'];
$nama_pelanggan = $_POST['cust-name'];

// Validasi data
$query = "INSERT INTO stok_keluar (operator, tanggal, jam_keluar, id_produk, jenis_sofa, pilihan_kain, warna, type_dudukan, kaki, jumlah, nama_supir, nama_pelanggan) 
            VALUES ('$operator', '$tanggal', '$jam_keluar', '$id_produk', '$jenis_sofa', '$pilihan_kain', '$warna', '$type_dudukan', '$kaki', '$jumlah', '$nama_supir', '$nama_pelanggan')";


// Konversi jumlah menjadi integer
$jumlah = (int) $jumlah;

// Query untuk menyimpan data stok keluar
$sql = "INSERT INTO stok_keluar (operator, tanggal_keluar, jam_keluar, nama_produk, jenis_sofa, kain, warna, type_dudukan, jumlah, nama_supir, nama_pelanggan) VALUES ('$operator', '$tanggal_keluar', '$jam_keluar',  '$nama_produk', '$jenis_sofa', '$kain', '$warna', '$type_dudukan', '$jumlah', '$nama_supir', '$nama_pelanggan')";

if (mysqli_query($conn, $sql)) {
    echo "<script>alert('Data berhasil disimpan');</script>";
    header("Location: sukses.html");
  } else {
    echo "<script>alert('Data gagal disimpan');</script>";
    header("Location: gagal.html");
  }

mysqli_close($conn);
?>
