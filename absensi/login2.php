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
<html>
<form name="form1" method="post" action="ceklogin.php">
	<table>
		<tr>
			<td colspan=2><div align="center">Halaman Login</div></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td><input type="submit" name="Submit" value="Login"></td>
		</tr>
	</table>
</form>
