<?php 
	session_start();
    include_once("../backend/functions.php");
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
        <table border=1>
            <tr>
                <th>ID transaksi</th>
                <th>Username</th>
                <th>Judul Buku</th>
                <th>Status</th>
                <th>Waktu Peminjaman</th>
                <th>Waktu Pengembalian</th>
            </tr>
            <?php 
            $data = cekPeminjaman();
            if (empty($data)){
                echo "<tr>";
                echo "<td colspan=\"6\"><center>Tidak ada data</center></td>";
                echo "</tr>";
            }else{
               // print_r($data);
                foreach($data as $pinjam){
                    //print_r($data);
                    echo "<tr>";
                    echo "<td>{$pinjam['id']}</td>";
                    echo "<td>{$pinjam['username']}";
                    echo "<td>{$pinjam['judul']}</td>";
                    echo "<td>{$pinjam['status']}</td>";
                    echo "<td>{$pinjam['waktu_pengembalian']}</td>";
                    echo "<td>{$pinjam['waktu_peminjaman']}</td>";
                    echo "</tr>";
                }
            }
            ?>
        </table>
        </div>

</body>
<!-- FOOTER -->
    <?php
    include_once("../template/footer.php");
    ?>

</html>