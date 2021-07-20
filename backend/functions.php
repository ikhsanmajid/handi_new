<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "handi2", "7jebatsendal", "handi2");

////////////////////////////////////////////////////////////////////////////////////////////////////////
	function query($query) {
		global $conn;
		$result = mysqli_query($conn, $query);
		$rows = [];
		while ( $row = mysqli_fetch_assoc($result) ) {
			$rows[] = $row;
		}
		return $rows;
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////
	function tambah($data) {
		global $conn;

		$kode_buku = htmlspecialchars($data["kode_buku"]);
		$judul = htmlspecialchars($data["judul"]);
		$penerbit = htmlspecialchars($data["penerbit"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$kategori_buku = htmlspecialchars($data["kategori_buku"]);
		$jumlah = htmlspecialchars($data["jumlah"]);

		//upload gambar
		$cover = upload();
		if(!$cover) {
			return false;
		}

		$query = "INSERT INTO buku
					VALUES
					('', '$kode_buku', '$judul', '$penerbit', '$penulis','$tahun','$kategori_buku','$jumlah', '$cover')
			";
	mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}

///////////////////////////////////////////////////////////////////////////////////////////
function upload (){
			$namaFile = $_FILES['cover']['name'];
			$ukuranFile = $_FILES['cover']['size'];
			$error = $_FILES['cover']['error'];
			$tmpName = $_FILES['cover']['tmp_name'];

			//cek apakah tidak ada gambar yang di upload

			if ($error === 4) {
				echo "<script>
						alert('pilih gambar buku terlebih dahulu!');
						</script>";
					return false;
			}

			// cek apakah yang di upload adalah gambar
			$ekstensiGambarValid = ['jpg','jpeg','png'];
			$ekstensiGambar = explode('.', $namaFile);
			$ekstensiGambar = strtolower(end($ekstensiGambar));
			if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){
				echo "<script>
						alert('yang anda upload bukan gambar!');
						</script>";
					return false;
			}

			// cek jika ukurannya terlalu besar 
			if ($ukuranFile > 3000000) {
				echo "<script>
						alert('ukuran gambar terlalu besar!');
						</script>";
					return false;
			}

		// lolos pengecekan, gambar siap di upload
		//Generate nama gambar baru
		$namaFileBaru = uniqid();
		$namaFileBaru .= '.';
		$namaFileBaru .= $ekstensiGambar; 

		move_uploaded_file($tmpName, '../assets/img/' . $namaFileBaru);

		return $namaFileBaru;
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////
	function hapus($id) {
		global $conn;
		mysqli_query($conn, "DELETE FROM buku WHERE id = $id");
		return mysqli_affected_rows($conn);
	}

////////////////////////////////////////////////////////////////////////////////////////////////////////
	function ubah($data){
		global $conn;

		$id = $data["id"];
		$kode_buku = htmlspecialchars($data["kode_buku"]);
		$judul = htmlspecialchars($data["judul"]);
		$penerbit = htmlspecialchars($data["penerbit"]);
		$penulis = htmlspecialchars($data["penulis"]);
		$tahun = htmlspecialchars($data["tahun"]);
		$kategori_buku = htmlspecialchars($data["kategori_buku"]);

		$coverLama = htmlspecialchars($data["coverLama"]);

		// cek apakah user pilih gambar baru atau tidak
		if( $_FILES['gambar']['error']=== 4 ){
			$cover = $coverLama;
		} else {
			$cover = upload();
		}

		$query = "UPDATE buku SET 
					kode_buku = '$kode_buku',
					judul = '$judul',
					penerbit = '$penerbit',
					penulis = '$penulis',
					tahun = '$tahun',
					kategori_buku = '$kategori_buku',

					cover = '$cover'
				WHERE id = $id
					";
	mysqli_query($conn, $query);
		return mysqli_affected_rows($conn);
	}
////////////////////////////////////////////////////////////////////////////////////////////////////////
function cari($keyword) {
	$query = "SELECT * FROM buku
				WHERE
			kode_buku LIKE '%$keyword%' OR 
			judul LIKE '%$keyword%' OR 
			penerbit LIKE '%$keyword%' OR 
			penulis LIKE '%$keyword%' OR 
			tahun LIKE '%$keyword%' OR 
			kategori_buku LIKE '%$keyword%' 
			";
		return query($query);
} 


////////////////////////////////////////////////////////////////////////////////////////////////////////
	function registrasi($data) {
		global $conn;

		$username = strtolower(stripslashes($data["username"]));
		$password = mysqli_real_escape_string($conn,$data["password"]);
		$password2 = mysqli_real_escape_string($conn,$data["password2"]);
		$namaLengkap = htmlspecialchars($data["namaLengkap"]);
		$jenisKelamin = htmlspecialchars($data["jenisKelamin"]);
		$alamat = htmlspecialchars($data["alamat"]);
		$noTelp = htmlspecialchars($data["noTelp"]);
		$level = htmlspecialchars($data["level"]);
		// $level	= htmlspecialchars($data["level"]);

		//cek username sudah ada atau belum
		$result = mysqli_query($conn, "SELECT username FROM user WHERE 
			username = '$username'");
		
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
					alert('username sudah terdaftar!');
				</script>";
				return false;
		}

		//cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
					alert('konfirmasi password tidak sesuai!');
				</script>";
				return false;
		}

		//enkripsi password
		//$password = password_hash($password, PASSWORD_DEFAULT);

		//tambahkan userbaru ke database
		mysqli_query($conn,"INSERT INTO user VALUES('', '$username', '$password', '$namaLengkap','$jenisKelamin','$alamat','$noTelp','$level' )");

		return mysqli_affected_rows($conn);
	}


////////////////////////////////////////////////////////////////////////////////////////////////////////
	function cekPeminjaman(){
		global $conn;

		$query = "SELECT transaksi.id, user.username, buku.judul, transaksi.status, transaksi.waktu_peminjaman, transaksi.waktu_pengembalian FROM ((transaksi INNER JOIN user ON transaksi.username = user.username) INNER JOIN buku ON transaksi.kd_buku = buku.kode_buku)";
		$result = $conn->query($query);
		$rows = $result->fetch_all(MYSQLI_ASSOC);
		$result->free_result();
		$conn->close();
		return $rows;
	}


?>