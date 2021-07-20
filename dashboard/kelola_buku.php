<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
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
       
    <style>
        div.content h2 {
        background-color: rgb(55, 143, 106);
        color: white;
        text-align: center;
        font-size: 32px;
        padding: 10px;
        width: 100%;
        }
        div.content input[type="text"], textarea {
        width: 600px;
        margin: 10px;
        margin-left: 14px;
        padding: 10px;
        }
    </style>
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
        <h2>Kelola Buku</h2>
        <a href="../config/tambahbuku.php" 
        style="border: 1px solid black;
        background-color: white;
        padding : 5px;
        "> 
        + Tambah Buku</a>
      
        <form action="" method="post">
	
        	<input type="text" name="keyword" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
	        <button type="submit" name="cari" style="padding:10px; background-color:rgb(170, 231, 158);"> CARI! </button>

        </form>

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
            <th>Aksi</th>
    </tr>
    <?php $i =1; ?>
    <?php foreach ($buku as $row) : ?>
        <tr>
            <td><?= $i; ?></td>
            <td><img src="../assets/img/<?= $row["cover"]; ?>"></td>
            <td><?= $row["kode_buku"]; ?></td>
            <td><?= $row["judul"]; ?></td>
            <td><?= $row["penerbit"]; ?></td>
            <td><?= $row["penulis"]; ?></td>
            <td><?= $row["tahun"]; ?></td>
            <td><?= $row["kategori_buku"]; ?></td>
            <td><?= $row["jumlah"]; ?></td>
            <td>
            <a href="../config/ubahbuku.php?id=<?= $row["id"];  ?>">ubah</a> |
			<a href="../config/hapusbuku.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?');" >hapus</a>
            </td>
         </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
      </table>

      <h2>.</h2>
     </div>

<!-- FOOTER -->
    <?php
    include_once("../template/footer.php");
    ?>

</body>

</html>
