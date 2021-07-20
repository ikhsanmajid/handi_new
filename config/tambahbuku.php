<?php 
	session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}

    require '../backend/functions.php';

    //cek apakah tombol submit sudah ditekan atau belum
    if (isset($_POST["submit"])) {

    //cek apakah data berhasil ditambah atau tidak
    if ( tambah($_POST) > 0 ) {
        echo "
        <script>
            alert('data berhasil ditambahkan!');
            document.location.href = '../dashboard/kelola_buku.php';
        </script>
        ";
    }else {
        echo "
        <script>
            alert('data gagal ditambahkan!');
            document.location.href = '../dashboard/kelola_buku.php';
        </script>
        ";
         }
    }
?>

<!DOCTYPE html>
<html>
<head>
       <title>Tambah Data Buku</title>
         <link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">
       
    <style>
       
      
    </style>
</head>

<body>
<!-- HEADER -->
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
	include_once("../template/sidebar.php");
     ?>

<!-- ISI -->
<div class="content">
   <h2>Tambah Data Buku</h2>

<form action="" method="post" enctype="multipart/form-data">
	<ul>
		<li>
		<label for="kode_buku">Kode Buku : </label>
		<input type="text" name="kode_buku" id="kode_buku" required>	
		</li>

		<li>
		<label for="judul">Judul : </label>
		<input type="text" name="judul" id="judul" required>	
		</li>

		<li>
		<label for="penerbit"> Penerbit : </label>
		<input type="text" name="penerbit" id="penerbit" required>	
		</li>

		<li>
		<label for="penulis">Penulis : </label>
		<input type="text" name="penulis" id="penulis" required>	
		</li>

        <li>
		<label for="tahun">Tahun : </label>
		<input type="text" name="tahun" id="tahun" required>	
		</li>

        <li>
		<label for="kategori_buku">Kategori Buku : </label>
		<input type="text" name="kategori_buku" id="kategori_buku" required>	
		</li>

        <li>
		<label for="jumlah">Jumlah : </label>
		<input type="text" name="jumlah" id="jumlah" required>	
		</li>

		<li>
		<label for="cover">Cover : </label>
		<input type="file" name="cover" id="cover">	
		</li>

		<li>
			<button type="submit" name="submit">Tambah Data!</button>
		</li>

	</ul>
</form>
<h2>.</h2>
</div>

<!-- FOOTER -->
    <?php
    include_once("../template/footer.php");
    ?>

</body>
</html>
