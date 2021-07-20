<?php 

session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}

    require '../backend/functions.php';

//ambil data di URL
$id = $_GET["id"];

//query data mahasiswa berdasarkan id
$buku = query("SELECT * FROM buku WHERE id = $id")[0];

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {

	//cek apakah data berhasil diubah atau tidak
		if ( ubah($_POST) > 0 ) {
			echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = '../dashboard/kelola_buku.php';
			</script>
			";
		}else {
			echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = '../dashboard/kelola_buku.php';
			</script>
			";
		}
	}
 ?>

<!DOCTYPE html>
<html>
<head>	
	<title>Ubah Data Buku</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/style_admin.css">
	<style>
        div.content h2 {
            background-color: rgb(55, 143, 106);
            color: white;
            text-align: center;
            font-size: 32px;
            padding: 10px;
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
<div class="content">
<h2>Ubah Data Buku</h2>

<form action="" method="post" enctype="multipart/form-data">
	
		<input type="hidden" name="id" value="<?= $buku["id"];  ?>">
		<input type="hidden" name="coverLama" value="<?= $buku["cover"];  ?>">
	<ul>
		<li>
		<label for="kode_buku">Kode Buku : </label>
		<input type="text" name="kode_buku" id="kode_buku" required value="<?= $buku["kode_buku"]; ?>">	
		</li>

		<li>
		<label for="judul">Judul : </label>
		<input type="text" name="judul" id="judul" required value="<?= $buku["judul"];  ?>">	
		</li>

		<li>
		<label for="penerbit"> Penerbit : </label>
		<input type="text" name="penerbit" id="penerbit" required value="<?= $buku["penerbit"]; ?>">	
		</li>

		<li>
		<label for="penulis">Penulis : </label>
		<input type="text" name="penulis" id="penulis" required value="<?= $buku["penulis"]; ?>">	
		</li>

		<li>
		<label for="kategori_buku">Kategori Buku : </label>
		<input type="text" name="kategori_buku" id="kategori_buku" required value="<?= $buku["kategori_buku"]; ?>">	
		</li>

		<li>
		<label for="jumlah">Jumlah : </label>
		<input type="text" name="jumlah" id="jumlah" required value="<?= $buku["jumlah"]; ?>">	
		</li>

		<li>
		<label for="cover">Cover : </label>
		<img src="../assets/img/<?= $buku['cover']; ?>">		
		<input type="file" name="cover" id="cover">	
		</li>

		<li>
			<button type="submit" name="submit">Ubah Data!</button>
		</li>

	</ul>
</form>
	</div>

</body>
</html>