<?php
include 'koneksi.php';

// menyimpan data id_buku kedalam variabel
$id_buku = $_GET['id_buku'];

// query SQL untuk menghapus data
$query = "DELETE FROM tb_buku WHERE id_buku='$id_buku'";
$result = mysqli_query($koneksi, $query);

// mengalihkan halaman kembali ke index.php
header("location:admin.php");
?>
