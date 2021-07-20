<?php 

// session_start();

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
   
<!-- Navigasi Atas -->
<?php 
	require_once("./template/NavTop.php");
   ?>

</head>
<body>
     
<div class="content">
<h2> Selamat Datang di WEBSITE KELOMPOK 3 PEMROGRAMAN WEB.</h2>
<br>

<!-- Cari -->
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
            <th>Penerbit</th>
            <th>Penulis</th>
            <th>Tahun</th>
            <th>Kategori</th>
            <th>Jumlah</th>
         </tr>
         <?php $i =1; ?>
      <?php foreach ($buku as $row) : ?>
         <tr>
            <td><?= $i; ?></td>
            <td><img src="assets/img/<?= $row["cover"]; ?>"></td>
            <td><?= $row["kode_buku"]; ?></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["penerbit"]; ?></td>
            <td><?= $row["penulis"]; ?></td>
            <td><?= $row["tahun"]; ?></td>
            <td><?= $row["kategori_buku"]; ?></td>
            <td><?= $row["jumlah"]; ?></td>
         </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
      </table>

      <h2>.</h2>
      <!-- ............................................ -->
</div>

</body>
  
   <?php
    include_once("./template/footer.php");
    ?>

</html>