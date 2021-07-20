<?php 

session_start();

session_start();
	// cek apakah yang mengakses halaman ini sudah login
	if($_SESSION['level']==""){
		header("location:../login.php?pesan=gagal");
	}

	require '../backend/functions.php';

$id = $_GET["id"];

if ( hapus($id) > 0 ) {
echo "
	<script>
		alert('data berhasil dihapus!');
		document.location.href = '../dashboard/kelola_buku.php';
	</script>
	";
}else {
	echo "
	<script>
		alert('data gagal dihapus!');
		document.location.href = '../dashboard/kelola_buku.php';
	</script>
	";

}

 ?>