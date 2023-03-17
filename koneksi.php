<?php
//konfigurasi koneksi database
$servername = "localhost";
$username = "ajegmebe_kantor";
$password = "@736Padamu";
$dbname = "ajegmebe_office";

// membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// mengecek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
