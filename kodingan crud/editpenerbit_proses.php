<?php 
// koneksi database 
include 'koneksi.php'; 
// menangkap data yang di kirim dari form 
$id_penerbit = $_POST['id_penerbit']; 
$nama = $_POST['nama']; 
$alamat = $_POST['alamat']; 
$kota = $_POST['kota'];
$telepon = $_POST['telepon']; 
// update data ke database 
mysqli_query($koneksi,"update tb_penerbit set nama='$nama', 
alamat='$alamat', kota='$kota', telepon='$telepon' where id_penerbit='$id_penerbit'"); 
 
// mengalihkan halaman kembali ke index.php 
header("location:pengadaan.php"); 
