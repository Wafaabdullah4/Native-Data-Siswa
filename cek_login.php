<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password =  md5($_POST['password']);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from actor where username='$username' and password='$password' ");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if ($data['level'] == "admin") {

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/halaman_admin.php");

		// cek jika user login sebagai pegawai
	} else if ($data['level'] == "walikelas") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "walikelas";
		// alihkan ke halaman dashboard pegawai
		header("location:walikelas/halaman_walikelas.php");

		// cek jika user login sebagai pengurus
	} else if ($data['level'] == "siswa") {
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "siswa";
		// alihkan ke halaman dashboard pengurus
		header("location:siswa/halaman_siswa.php");
	} else {

		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}
} else {
	header("location:index.php?pesan=gagal");
}
