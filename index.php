<?php 

session_start();
 
// if($_SESSION['level']==""){
//    header("location:../login.php?pesan=gagal");
// }

require 'backend/functions.php';

//lakukan query pada halaman function
$buku = query("SELECT * FROM buku");

// tombol cari di klik
if (isset($_POST["cari"])) {
	$buku = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
   <head>
      <title>Aplikasi Peminjaman Buku</title>
      <link rel="stylesheet" href="assets/css/style.css">
      <style>
            div.content h2 {
            background-color: rgb(55, 143, 106);
            color: white;
            width:100%;
            text-align: center;
            padding: 10px;
            }
      </style>
   </head>

<body>

   <?php 
	require_once("./template/NavTop.php");
   ?>

   <div class="content">
   <p style="font-size: 30px; text-align: center;">Selamat Datang pada perpustakaan KELOMPOK 3 Pemrograman Web.</p>

   <br><br>
   <!-- Pencarian -->
   <form action="" method="post">
      <input type="text" name="keyword" size="30" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
      <button type="submit" name="cari"> CARI! </button>
   </form>
   <br><br>

   <!-- Tabel Buku -->
   <table id="tabelbuku">
  <tr>
      <th>No.</th>
      <th>Cover</th>
       <th>Kode Buku</th>
     <th>Judul Buku</th>
  </tr>
  <?php $i =1; ?>
      <?php foreach ($buku as $row) : ?>
  <tr>
      <td><?= $i; ?></td>
      <td><img src="assets/img/<?= $row["cover"]; ?>"></td>
      <td><?= $row["kode_buku"]; ?></td>
      <td><?= $row["judul"]; ?></td>
  </tr>
       <?php $i++; ?>
      <?php endforeach; ?>
      </table>

      <h2>.</h2>
      </div>
</body>
  
      <?php
      include_once("./template/footer.php");
      ?>

</html>