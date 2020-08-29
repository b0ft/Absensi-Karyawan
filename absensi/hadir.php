<?php
include_once("config.php");

if(isset($_POST['submit'])){
	session_start();
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$devisi = $_POST['devisi'];
	$lokasi = $_POST['lokasi'];

$result = mysqli_query($conn, "INSERT INTO `hadir` (`nik`, `nama`, `devisi`, `lokasi`, `waktu`) VALUES ('$nik', '$nama', '$devisi', '$lokasi', CURRENT_TIME())");
header("location:index.php");
}
?>