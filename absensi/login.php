<?php
session_start();

if(isset($_SESSION['akses']))
{
	header('location:'.$_SESSION['akses']);
	exit();
}

$error = '';
if(isset($_SESSION['error'])){
	$error = $_SESSION['error'];
	unset($_SESSION['error']);
}
?>

<?php echo $error;?>

<!DOCTYPE html>
<html>
<head>
	<title>Halaman Login</title>
	<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>

<h2>Halaman Login</h2>

<form action="ceklogin.php" method="post" name="form1">
  <div class="imgcontainer">
  </div>

  <div class="container">
    <label><b>Nama</b></label>
    <input type="text" placeholder="Masukan Nama" name="username" required>

    <label><b>Kata Sandi</b></label>
    <input type="password" placeholder="Masukan kata Sandi" name="password" required>
        
    <button type="submit" name="submit">Masuk</button>
    
  </div>

  <div class="container" style="background-color:#f1f1f1">
  </div>
</form>

</body>
</html>
