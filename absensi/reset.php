<?php
include_once("config.php");
if(isset($_POST['submit'])){
	session_start();
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$nomortelp = $_POST['nomortelp'];
	$devisi = $_POST['devisi'];
	$lokasi = $_POST['lokasi'];

$result = mysqli_query($conn, "DELETE FROM hadir;");
header("location: admin.php");
}
?>
