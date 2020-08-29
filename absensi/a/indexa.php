<?php
include_once("config.php");

if(isset($_POST['submit'])){
	session_start();
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$devisi = $_POST['devisi'];
	$lokasi = $_POST['lokasi'];

$result = mysqli_query($conn, "INSERT INTO `hadir` (`nik`, `nama`, `devisi`, `lokasi`, `waktu`) VALUES ('$nik', '$nama', '$devisi', '$lokasi', CURRENT_TIME())");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<!--Import Google Icon Font-->
      <link href="fonts/material.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
      <style type="text/css">
      	.banner {
      		background:url(images/sample-1.jpg);
			background-repeat: no-repeat;
			background-position: 50% 50%;
			width: 100%;
			height: 250px;
			display: inline-block;
			position: relative;
			margin-top: 0px;
      	}

      </style>

</head>
<body class="grey lighten-3">
	<div class="row">
		<!--Banner-->
		<div class="col s12 m12 l12 banner">
			<div class="section">
				<h3 class="center-align white-text hide-on-med-only hide-on-small-only" style="margin-top:100px;">Ada rapat apa hari ini ?</h3>
				<h4 class="center-align white-text hide-on-large-only hide-on-small-only" style="margin-top:100px;">Ada rapat apa hari ini ?</h4>
				<h5 class="center-align white-text hide-on-large-only hide-on-med-only" style="margin-top:100px;">Ada rapat apa hari ini ?</h5>
			</div>
		</div>

		<!--form 1-->
		<div class="col s12 m12 l5 offset-l1" style="margin-top:15px;">
			<div class="card-panel">
				<div class="card-title center">
	                <h5>Form Absen</h5>
	            </div>

				<form class="container" method="post">
					<div class="row">
						<div class="input-field col s12 m6 l6">
				          <input id="nik" type="text" class="validate" name="nik">
				          <label for="nik">NIK</label>
				        </div>

				        <div class="input-field col s12 m6 l6">
				          <input id="devisi" type="text" class="validate" name="devisi">
				          <label for="devisi">DEVISI</label>
				        </div>

				        <div class="input-field col s12">
				          <input id="loker" type="text" class="validate" name="lokasi">
				          <label for="loker">LOKASI KERJA</label>
				        </div>
					</div>
					<div class="row">
						<!-- Modal Trigger -->
						<a class="modal-trigger" >
							<input type="submit" name="submit" value="Hadir" class="btn col s12 m12 l12">
						</a>
					</div>
					
					<!-- Modal Structure -->
					<div id="modal1" class="modal">
						<div class="modal-content">
							<i class="material-icons modal-action modal-close waves-effect waves-red right">close</i>
					    	<h5>Terima Kasih Telah Hadir !</h5>
					    	<p>Nama anda sudah masuk dalam daftar hadir</p>
					    </div>    
					</div>

				</form>	
			</div>	
		</div>

		<!--output-->
		<div class="col s12 m12 l5" style="margin-top:15px;">
			<div class="card-panel">
				<div class="card-title center">
	                <h5>Daftar Kehadiran</h5>
	            </div>

				<table class="striped">
					<thead>
						<tr>
							<td>NIK</td>
							<td>Nama</td>
							<td>Devisi</td>
							<td>Lokasi Kerja</td>
							<td>Waktu</td>
						</tr>
					</thead>
		<?php
		session_start();
		include_once("config.php");
			$result = mysqli_query($conn,"SELECT * FROM hadir ORDER BY waktu ASC");
				while ($user_data = mysqli_fetch_array($result)) {	
					echo "<tbody>" ;
						echo "<tr>";
						echo "<td>".$user_data['nik']."</td>";
						echo "<td>".$user_data['nama']."</td>";
						echo "<td>".$user_data['devisi']."</td>";
						echo "<td>".$user_data['lokasi']."</td>";
						echo "<td>".$user_data['waktu']."</td>";
						echo "</tr>";
					echo "</tbody>";
				}
		?>
				</table>
			</div>

			<div class="row right">
				<!-- Modal Trigger -->
				<a class="btn modal-trigger" href="#modal2">Print</a>
				<!-- Modal Structure -->
				<div id="modal2" class="modal">
					<div class="modal-content">
						<i class="material-icons modal-action modal-close waves-effect waves-red right">close</i>
				    	<h5>Print Laporan Daftar Hadir</h5>
				    	<p>Pastikan anda memiliki hak akses</p>
				    	<form>
				    		<input type="text" name="kode" placeholder="Masukan kode unik untuk print">
				    		<input type="submit" name="cetak" value="Cetak" class="btn">
				    	</form>
				    </div>    
				</div>

			</div>
		</div>
	</div>

	<!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="js/materialize.min.js"></script>
      <script>
        $( document ).ready(function(){
          Materialize.updateTextFields();
          $('.modal').modal();
        })
      </script>
</body>
</html>