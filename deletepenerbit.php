<?php
include 'koneksi.php';

// menyimpan data id_buku kedalam variabel
$id_penerbit = $_GET['id_penerbit'];

// query SQL untuk menghapus data
$query = "DELETE FROM tb_penerbit WHERE id_penerbit='$id_penerbit'";
$result = mysqli_query($koneksi, $query);

header("location:pengadaan.php");
?>
