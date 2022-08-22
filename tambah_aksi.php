<?php 
// koneksi database
include 'koneksi.php';
 
// menangkap data yang di kirim dari form
$nama = $_POST['nama'];
$nim = $_POST['stok'];
$alamat = $_POST['harga'];
 
// menginput data ke database
mysqli_query($koneksi,"insert into makanan values('','$nama','$stok','$harga')");
 
// mengalihkan halaman kembali ke index.php
header("location:index.php");
 
?>