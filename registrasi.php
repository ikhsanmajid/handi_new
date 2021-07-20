<?php 

require 'backend/functions.php';

if(isset($_POST["register"])) {

	if(registrasi($_POST) > 0) {
		echo "<script>
				alert('user baru berhasil ditambahkan');
				document.location.href = 'login.php';
				</script>";
	} else {
		echo mysqli_error($conn);
		} 
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Aplikasi Peminjaman Buku</title>
	<link rel="stylesheet" type="text/css" href="assets/css/styleRegistrasi.css">

</head>

<body>

	<?php 
	   require_once("./template/NavTop.php");
   ?>

  <form action = "" method="post">
  <div class="container">

  <h1>Form Registrasi</h1>
    <hr>

    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Input Username" name="username" id="username" required>
	
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Input Password" name="password" id="password" required>
	<br>
	<label for="password2"><b>Konfirmasi Password</b></label><br>
    <input type="password" placeholder="Konfirmasi Password" name="password2" id="password2" required>
	<br>
	<label for="namaLengkap"><b>Nama Lengkap</b></label><br>
    <input type="text" placeholder="Input Nama Lengkap" name="namaLengkap" id="namaLengkap" required>
	<br>
	<label>Jenis Kelamin : </label>
	<br>
			<input class="radio" type="radio" name="jenisKelamin" id="laki-laki" value="Laki-Laki" required="required">
			<label for="laki-laki">Laki-laki</label><br>
			
			<input class="radio" type="radio" name="jenisKelamin" id="perempuan" value="Perempuan" required="required">
			<label for="perempuan">Perempuan</label><br>
			<br>
	
	<label for="alamat"><b>Alamat</b></label><br>
    <input type="text" placeholder="Input Alamat" name="alamat" id="alamat" required>
	<br>
	<label for="noTelp"><b>No. Telepon</b></label><br>
    <input type="text" placeholder="Input No.Telepon" name="noTelp" id="noTelp" required>
	<br>
    <label for="level"><b>Daftar sebagai </b></label> <br>
    <input class="radio" type="radio" name="level" id="anggota" value="anggota" required="required">
	<label for="anggota">anggota</label><br>
	<br>
    <hr>
    <p>Klik Register jika sudah mengisi semua Form.</p>

    <button type="submit" name="register" class="registerbtn">Register</button>
  </div>
  
  <div class="container signin">
    <p>Sudah Mempunyai Akun? <a href="login.php">Login</a>.</p>
  </div>
</form>



</body>

<?php 
	include_once("./template/footer.php");
   ?>

	
</html>
