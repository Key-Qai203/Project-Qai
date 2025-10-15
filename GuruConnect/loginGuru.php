<?php
include 'connect.php';

if ($conn->connect_error) {
	die('Database connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nip = isset($_POST['NIP']) ? $conn->real_escape_string($_POST['NIP']) : '';
	$nama = isset($_POST['namaGuru']) ? $conn->real_escape_string($_POST['namaGuru']) : '';
	$password = isset($_POST['password']) ? $conn->real_escape_string($_POST['password']) : '';

	if (empty($nip) || empty($nama) || empty($password)) {
		echo '<script>alert("NIP, Nama, dan Password harus diisi."); window.location.href = "loginGuru.html";</script>';
		exit();
	}

	$sql = "SELECT * FROM guru WHERE nip_guru = '$nip' AND nama = '$nama' AND password = '$password'";
	$result = $conn->query($sql);

	if ($result && $result->num_rows === 1) {
		header('Location: homePageGuru.html');
		exit();
	} else {
		echo '<script>alert("NIP, Nama, atau Password salah."); window.location.href = "loginGuru.html";</script>';
		exit();
	}
}
?>
