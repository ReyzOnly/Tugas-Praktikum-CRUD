<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Data</title>
  <link rel="stylesheet" href="style.css"> <!-- Menggunakan style.css yang telah diberikan -->
</head>
<body>
  <fieldset>
    <legend class="center">Data Buku</legend>
    <h1>Selamat Datang di Toko Reva</h1>
    <nav class="center">
       <a href="index.php" class="home">Home</a>  <a href="admin.php" class="admin">Admin</a>  <a href="pengadaan.php" class="pengadaan">Pengadaan</a> 
    </nav>
    <center>
      <a href="tambah_form.html" class="tambah-button">Tambah Data</a>
    </center>
    <br>
    <form method="GET" action="index.php" class="center">
      <label for="kata_cari">Kata Pencarian :</label>
      <input type="text" name="kata_cari" id="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" />
      <button type="submit">Cari</button>
    </form>
    <table>
      <thead>
        <tr>
          <th>ID Buku</th>
          <th>Kategori</th>
          <th>Nama Buku</th>
          <th>Harga</th>
          <th>Stok</th>
          <th>Penerbit</th>
          <th>OPSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'koneksi.php';
          if(isset($_GET['kata_cari'])) {
            $kata_cari = $_GET['kata_cari'];
            $query = "SELECT * FROM tb_buku WHERE 
              id_buku LIKE '%".$kata_cari."%' OR 
              nama_buku LIKE '%".$kata_cari."%' OR
              kategori LIKE '%".$kata_cari."%' OR
              harga LIKE '%".$kata_cari."%' OR
              stok LIKE '%".$kata_cari."%' OR
              penerbit LIKE '%".$kata_cari."%'
              ORDER BY id_buku ASC";
          } else {
            $query = "SELECT * FROM tb_buku ORDER BY id_buku ASC";
          }
          $result = mysqli_query($koneksi, $query);
          if(!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
          }
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['id_buku']; ?></td>
            <td><?php echo $row['kategori']; ?></td>
            <td><?php echo $row['nama_buku']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td><?php echo $row['stok']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <!-- Tambahan untuk opsi edit dan hapus -->
            <td>
              <a href="edit.php?id_buku=<?php echo $row['id_buku']; ?>" class="edit">EDIT</a>
              <a href="delete.php?id_buku=<?php echo $row['id_buku']; ?>" class="hapus">HAPUS</a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </fieldset>
</body>
</html>
