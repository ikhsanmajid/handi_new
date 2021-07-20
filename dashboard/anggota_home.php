<?php 
	session_start();
 	
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}
 	?>

<!DOCTYPE html>
<head>
   <title>Aplikasi Peminjaman Buku</title>
   <link rel="stylesheet" href="../assets/css/style.css">
 
</head>
<body>

   <!--Navigasi Atas-->
   <?php 
	require_once("../template/NavTopAnggota.php");
   ?>
  
   <!--Isi-->
   <div class="content">
    <h2>HOME</h2>

    <p style="font-size: 30px; text-align: center;">Selamat Datang pada perpustakaan KELOMPOK 3 Pemrograman Web.</p>
  
</div>

   <?php
    include_once("../template/footer.php");
    ?>

</body>
</html>