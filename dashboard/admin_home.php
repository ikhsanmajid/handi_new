<?php 
	session_start();

    // cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
	}


require '../backend/functions.php';

//lakukan query pada halaman function
$buku = query("SELECT * FROM buku");

// tombol cari di klik
if (isset($_POST["cari"])) {
	$buku = cari($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html>
<head>
       <title>Aplikasi Peminjaman Buku</title>
         <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">
</head>

<body>
    <header>
                 <p>APLIKASI PEMINJAMAN BUKU</p>
                    <aside class="menu">
                    <div class="menu-content">
                    Halo <b><?php echo $_SESSION['username']; ?>,</b> <b><?php echo $_SESSION['level']; ?></b>
                   </div>
                  </aside>
    </header>
<!-- SIDEBAR -->
    <?php 
	require_once("../template/sidebar.php");
     ?>
<!-- ISI -->
    <div class="content">
        <h2>Selamat Datang pada perpustakaan KELOMPOK 3 Pemrograman Web.</h2>
        <!-- <img src="images/udb.jpg" alt="UDB" style="margin-left: 160px; "> -->
   
     <!-- Pencarian -->
     <form action="" method="post">
      <input class="cari" type="text" name="keyword" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
      <button class="klikcari" type="submit" name="cari"> CARI! </button>
   </form>
   <br><br>
        <div class="tabelbuku">
   <!-- Tabel Buku -->
         <table border="1" cellpadding="10" cellspacing="0">
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
               <td><img src="../assets/img/<?= $row["cover"]; ?>"></td>
               <td><?= $row["kode_buku"]; ?></td>
               <td><?= $row["judul"]; ?></td>
            </tr>
      <?php $i++; ?>
      <?php endforeach; ?>
         </table>

         </div>
    </div>


</body>
<!-- FOOTER -->
    <?php
    include_once("../template/footer.php");
    ?>

</html>
