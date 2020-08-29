<?php
include_once("config.php");
if(isset($_POST['submit'])){
	session_start();
	$nik = $_POST['nik'];
	$nama = $_POST['nama'];
	$nomortelp = $_POST['nomortelp'];
	$devisi = $_POST['devisi'];
	$lokasi = $_POST['lokasi'];

$result = mysqli_query($conn, "INSERT INTO `hadir` (`nik`, `nama`, `nomortelp`, `devisi`, `lokasi`, `tanggal`, `waktu`) VALUES ('$nik', '$nama', '$nomortelp', '$devisi', '$lokasi', CURRENT_DATE(), CURRENT_TIME())");
					echo "<div id='modal1' class='modal'>
						<div class='modal-content'>
							<i class='material-icons modal-action modal-close waves-effect waves-red right'>close</i>
					    	<h5>Terima Kasih Telah Hadir !</h5>
					    	<p>Nama anda sudah masuk dalam daftar hadir</p>
					    </div>    
					</div>";

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Absensi Rapat</title>
	<!--Import Google Icon Font-->
      <link href="fonts/material.css" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
		<style type="text/css" media="print">
    .page
    {
     -webkit-transform: rotate(-90deg); 
     -moz-transform:rotate(-90deg);
     filter:progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }
</style>
      <style type="text/css">
		@media print {
		  body * {
		    visibility: hidden;
		  }
		  #printclick, #printclick * {
		    visibility: visible;
		  }
		  #printclick {
		    position: absolute;
		    left: 0;
		    top: 0;
		  }
		}
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
<body class="white">
<script>
function printDiv() {
    var divToPrint = document.getElementById('printclick');
    var htmlToPrint = '' +
        '<style type="text/css">' +
        'body{-webkit-print-color-adjust:exact;}table th, table td {' +
        'border:1px solid #000; background-color: red; color:white;' +
        'padding:0.5em; ' +
        '}' +
        'table {width:100%; orientation:landscape;} .btn{visibility: hidden;}' +
        '</style><img src="logo.png" width="30%">';
    var tgl = '<p align=right>Jakarta, .....................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br><br><br><br><br>' +
    '<p align=right>(..................................................)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
    htmlToPrint += divToPrint.outerHTML;
    htmlToPrint += tgl;
    newWin = window.open("");
    newWin.document.write(htmlToPrint);
    newWin.print();
    newWin.close();
}
</script>
	<div class="row">
		<!--Banner-->
		<div class="col s12 m12 l12 center red darken-4">
			<div class="section">
				<img src="logo.png" width="30%">
			</div>
		</div>

		<!--form 1-->
		<div class="col s12 m12 l6 offset-l3" style="margin-top:15px;">
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
				          <input id="nama" type="text" class="validate" name="nama">
				          <label for="nik">NAMA</label>
				        </div>

				        <div class="input-field col s12 m6 l6">
				          <input id="devisi" type="text" class="validate" name="devisi">
				          <label for="devisi">DEVISI</label>
				        </div>

				        <div class="input-field col s12 m6 l6">
				          <input id="nomortelp" type="text" class="validate" name="nomortelp">
				          <label for="nomortelp">NO. TELP</label>
				        </div>

				        <div class="input-field col s12">
				          <input id="loker" type="text" class="validate" name="lokasi">
				          <label for="loker">LOKASI KERJA</label>
				        </div>
					</div>
					<div class="row">
						<!-- Modal Trigger -->
							<input type="submit" name="submit" value="Hadir" class="btn col s12 m12 l12 red darken-1" data-target="modal1">
					</div>
					
					<!-- Modal Structure -->

				</form>	
			</div>	
		</div>

		<!--output-->
	<div id="printclick">
		<div class="col s12 m12 l10 offset-l1" style="margin-top:15px;">
			<div class="card-panel">
				<div class="card-title center">
	                <h1>Daftar Kehadiran</h1>
	            </div>

				<table class="striped">
					<thead>
						<tr>
							
							<td>NIK</td>
							<td>Nama</td>
							<td>No. Telp</td>
							<td>Devisi</td>
							<td>Lokasi Kerja</td>
							<td>Tanggal</td>
							<td>Waktu</td>
							<td>TTD</td>
						</tr>
					</thead>

					<tbody>


		<?php
			$result = mysqli_query($conn,"SELECT * FROM hadir ORDER BY waktu  ASC");
				while ($user_data = mysqli_fetch_array($result)) {	
						echo "<tr>";
						
						echo "<td>".$user_data['nik']."</td>";
						echo "<td>".$user_data['nama']."</td>";
						echo "<td>".$user_data['nomortelp']."</td>";
						echo "<td>".$user_data['devisi']."</td>";
						echo "<td>".$user_data['lokasi']."</td>";
						echo "<td>".$user_data['tanggal']."</td>";
						echo "<td>".$user_data['waktu']."</td>";
						echo "<td></td>";
						echo "</tr>";
				}
		?>
						</tr>
					</tbody>
				</table>
	</div>


			<div class="row right">
				<button onclick="javascript:printDiv();" class="btn red darken-1">PRINT</button><br><br>
				<a href="login.php" style="color: white;"><button class="btn red darken-1" >LOGIN</button></a>
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