<?php 
session_start();

if (!isset($_SESSION['login'])) {
  header("Location: ../login.php");
  exit;
}


include '../koneksi.php';
$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM posting WHERE id = '$id';");
$cek = mysqli_affected_rows($conn);
if ($cek > 0) {
	echo "<script>alert('Konten berhasil dihapus'); document.location.href='konten.php';</script>";
}

?>