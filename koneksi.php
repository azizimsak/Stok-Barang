<?php
//konfigurasi koneksi database
$servername = "localhost";
$username = "azizdev";
$password = "4736Padamu";
$dbname = "office";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
