<?php
include 'koneksi.php';

$result = mysqli_query($conn, "SELECT * FROM posting");
$data = mysqli_fetch_assoc($result);
var_dump($data);

