<?php
include 'connect.php';

if ($conn->connect_error) {
	die('Database connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$id_admin = isset($_POST['idAdmin']) ? $conn->real_escape_string($_POST['idAdmin']) : '';
	$password_admin = isset($_POST['pwAdmin']) ? $conn->real_escape_string($_POST['pwAdmin']) : '';

	if (empty($id_admin) || empty($password_admin)) {
		echo '<script>alert("ID dan Password harus diisi."); window.location.href = "loginAdmin.html";</script>';
		exit();
	}

	$sql = "SELECT * FROM adminconnect WHERE id_admin = '$id_admin' AND password_admin = '$password_admin'";
	$result = $conn->query($sql);

	if ($result && $result->num_rows === 1) {
		header('Location: homePageAdmin.html');
		exit();
	} else {
		echo '<script>alert("ID atau Password salah."); window.location.href = "loginAdmin.html";</script>';
		exit();
	}
}
?>