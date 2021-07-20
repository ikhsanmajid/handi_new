<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'backend/functions.php';
 
// menangkap data yang dikirim dari form login
if (isset($_POST["login"])) {
	$username = $_POST['username'];
	$password = $_POST['password'];
  
// menyeleksi data user dengan username dan password yang sesuai
$result = mysqli_query($conn,"SELECT * FROM user WHERE username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($result);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 	$data = mysqli_fetch_assoc($result);
			// cek jika user login sebagai admin
		if($data['level']=="admin"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "admin";
			// alihkan ke halaman dashboard admin
			echo "
			<script>
				alert('Berhasil Login sebagai Admin!');
				document.location.href = 'dashboard/admin_home.php';
			</script>
			";			
		//	header("Location:dashboard/admin_home.php");
		// cek jika user login sebagai pegawai
		}else if($data['level']=="anggota"){
			// buat session login dan username
			$_SESSION['username'] = $username;
			$_SESSION['level'] = "anggota";
			// alihkan ke halaman dashboard anggota
			echo "
			<script>
				alert('Berhasil Login sebagai Anggota!');
				document.location.href = 'dashboard/anggota_home.php';
			</script>
			";
			//	header("Location:dashboard/anggota_home.php");
		} 
		
	}
	$error = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Peminjaman Buku</title>
	<link rel="stylesheet" type="text/css" href="assets/css/formloginstyle.css">
</head>

<body>

	<?php 
	require_once("./template/NavTop.php");
   ?>

 			
  
<form method="post" action="">
				<!-- Notifikasi Gagal Login -->
			<?php if ( isset ($error) ) : ?>
					<div class='false'>Username atau Password tidak sesuai !</div>
			<?php endif; ?>	
<div id="login">
		<h2> Login </h2>
		<div class="input-group">
			<input type="text" name="username" value="" required="required">
			<span>Username</span>
		</div>
		<div class="input-group">
			<input type="password" name="password" value="" required="required">
			<span>Password</span>
		</div>
		<div class="input-group">
			<input type="submit" name="login" value="Login" onClick="" >
		</div>
        
	</div>
</form>

</body>
<?php
    include_once("./template/footer.php");
    ?>
</html>