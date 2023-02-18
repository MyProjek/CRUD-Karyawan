<?php
$server = "localhost";
$username = "root";
$password = "";
$db = "db_karyawan"; // Nama databasenya

$koneksi = mysqli_connect($server,$username,$password,$db); // pastikan urutan pemanggilan variabelnya sesuai

//Ce jika koneksi gagal atau tidak ke database
if(mysqli_connect_errno()) {
    echo "Koneksi ke database Gagal".mysqli_connet_error();
}
?>