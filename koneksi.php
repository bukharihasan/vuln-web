<?php

$host = "localhost";
$user = "admin";
$pass = "admin";
$db   = "vuln";

$conn = mysqli_connect($host, $user, $pass, $db);


function add_konten($data){

	global $conn;
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$tanggal = date("Y-m-d");

	mysqli_query($conn, "INSERT INTO posting VALUES(NULL, '$judul', '$isi', '$tanggal')");
	return mysqli_affected_rows($conn);
 }

function edit_konten($data){

	global $conn;
	$id = $_POST['id'];
	$judul = $_POST['judul'];
	$isi = $_POST['isi'];
	$tanggal = date("Y-m-d");

	mysqli_query($conn, "UPDATE `posting` SET `id` = '$id', `judul` = '$judul', `konten` = '$isi', `tanggal` = '$tanggal' WHERE `posting`.`id` = '$id';");
	return mysqli_affected_rows($conn);
 }


function regis($data){
	global $conn;

	$username = strtolower(stripslashes($data["username"]));
	$name = mysqli_real_escape_string($conn, $data["name"]);
	$password = mysqli_real_escape_string($conn, $data["pass1"]);
	$password2 = mysqli_real_escape_string($conn, $data["pass2"]);

	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

	if (mysqli_fetch_assoc($result)) {
		echo "<script>alert('Username telah digunakan')</script>";
		return false;
	}

	if ($password !== $password2) {
		echo "<script>
				alert('Password tidak sama');
			   </script>";
		return false;
	}

	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "INSERT INTO user VALUES(NULL, '$username', '$password', '$name')");
	return mysqli_affected_rows($conn);
}


function edit_user($data){

	global $conn;
	$id = $_POST['id'];
	$name = mysqli_real_escape_string($conn, $data["name"]);

	$password = password_hash($password, PASSWORD_DEFAULT);
	mysqli_query($conn, "UPDATE user SET name='$name' WHERE id='$id' ");
	return mysqli_affected_rows($conn);
 }

?>
