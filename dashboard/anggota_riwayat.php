<!DOCTYPE html>
<head>
   <title>Aplikasi Peminjaman Buku</title>
   <link rel="stylesheet" href="css/style.css">
    
</head>
<body>

<?php 
	session_start();
 	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:formLogin.php?pesan=gagal");
	}
 	?>

    <!--Navigasi Atas-->
   <nav>
      <ul>
         <li class="site">Aplikasi Peminjaman Buku</li>

         <li class="users"> Halo <b><?php echo $_SESSION['username']; ?>,</b> <b><?php echo $_SESSION['level']; ?></b> </li>
         <li class="items"><a href="anggota_home.php">Home</a></li>
         <li class="items"><a href="anggota_buku.php">Buku</a></li>
         <li id="active" class="items"><a href="#">Riwayat</a></li>
         <li class="items"><a href="anggota_tentang.php">Tentang</a></li>
         <li class="items"><a href="logout.php">Logout</a></li>
       
      </ul>
   </nav>
  
   <!--Isi-->
   <div class="content">
    <h2>RIWAYAT PEMINJAMAN</h2>
    <p style="font-size: 30px;">DAFTAR RIWAYAT</p> 
</div>


   <footer>
    © Copyright Kelompok 3 Pemrograman Web 2021. Universitas Duta Bangsa Surakarta.
</footer>

</body>
</html>