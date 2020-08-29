<?php
$url = 'http://localhost/absensi';
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'absensi';
$conn = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

if ($conn->connect_error)
{
	die('Koneksi Gagal :'.$koneksi->connect_error);
}
?>