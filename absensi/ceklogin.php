<?php
session_start();

if(!isset($_POST['username'])) {
	header('location:login.php');
	exit();
}

$error = '';

require('config.php');

$username = trim($_POST['username']);
$password = trim($_POST['password']);

if(strlen($username) < 2)
{
	$error = 'Username tidak boleh kosong';
}
elseif (strlen($password) < 2) {
	$error = 'Password tidak boleh kosong';
}
	else{
	$username = $conn->escape_string($username);
	$password = $conn->escape_string($password);
	$md5 = md5($password);
	$sql = "SELECT nama, akses FROM users WHERE username='$username' AND password='$md5' LIMIT 1";
	$query = $conn->query($sql);

	if (!$query) {
		die('Database gagal'.$conn->error);
	}

	if ($query->num_rows ==1) {
		$row = $query->fetch_assoc();
		$_SESSION['nama_user'] = $row['nama'];
		$_SESSION['akses'] = $row['akses'];

		if($row['akses'] == 'admin')
		{
			$_SESSION['saya_admin']='TRUE';
		}
		header('location:'.$_SESSION['akses'].'.php');
		exit();
	}
	else{
		$error = 'Username dan password salah';
	}
}

if(!empty($error)){
	$_SESSION['error'] = $error;
	header('location:'.$url.'/login.php');
	exit();
}
?>
}