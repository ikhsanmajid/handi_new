<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../index.php?pesan=gagal");
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
        <h2>Peminjaman & Pengembalian Buku</h2>
        <p>INI HALAMAN TRAKSAKSI BUKU</p>
        </div>

</body>
<!-- FOOTER -->
    <?php
    include_once("../template/footer.php");
    ?>

</html>