<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tampil Data Penerbit</title>
  <link rel="stylesheet" href="style.css"> <!-- Menggunakan style.css yang telah diberikan -->
</head>
<body>
  <fieldset>
    <legend class="center">Data Penerbit</legend>
    <h1>Selamat Datang di Toko Reva</h1>
    <nav class="center">
       <a href="index.php" class="home">Home</a>  <a href="admin.php" class="admin">Admin</a>  <a href="pengadaan.php" class="pengadaan">Pengadaan</a> 
    </nav>
    <center>
      <a href="tambahpenerbit_form.html" class="tambah-button">Tambah Data</a>
    </center>
    <form method="GET" action="pengadaan.php" class="center">
      <label for="kata_cari">Kata Pencarian : </label>
      <input type="text" name="kata_cari" id="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>" />
      <button type="submit">Cari</button>
    </form>
    <table>
      <thead>
        <tr>
          <th>ID Penerbit</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Kota</th>
          <th>Telepon</th>
          <th>OPSI</th>
        </tr>
      </thead>
      <tbody>
        <?php
          include 'koneksi.php';
          if(isset($_GET['kata_cari'])) {
            $kata_cari = $_GET['kata_cari'];
            $query = "SELECT * FROM tb_penerbit WHERE 
              id_penerbit LIKE '%".$kata_cari."%' OR 
              nama LIKE '%".$kata_cari."%' OR
              alamat LIKE '%".$kata_cari."%' OR
              kota LIKE '%".$kata_cari."%' OR
              telepon LIKE '%".$kata_cari."%'
              ORDER BY id_penerbit ASC";
          } else {
            $query = "SELECT * FROM tb_penerbit ORDER BY id_penerbit ASC";
          }
          $result = mysqli_query($koneksi, $query);
          if(!$result) {
            die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
          }
          while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row['id_penerbit']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td><?php echo $row['kota']; ?></td>
            <td><?php echo $row['telepon']; ?></td>
            <!-- Tambahan untuk opsi edit dan hapus -->
            <td>
              <a href="editpenerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>" class="edit">EDIT</a>
              <a href="deletepenerbit.php?id_penerbit=<?php echo $row['id_penerbit']; ?>" class="hapus">HAPUS</a>
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
