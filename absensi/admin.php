<?php
include_once("config.php");
if(isset($_POST['reset'])){
	$result = mysqli_query($conn, "DELETE FROM hadir;");
	header("location: admin.php");
}

if(isset($_POST['logout'])){
	session_start();
	session_destroy();
	header('location:index.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Absensi Rapat (Admin)</title>
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
			$result = mysqli_query($conn,"SELECT * FROM hadir ORDER BY waktu ASC");
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
					<form action="" method="post">
				<input type="submit" name="reset" class="btn red darken-1" value="reset"><br><br>
				<input type="submit" name="logout" class="btn red darken-1" value="logout" >
				    	</form>
				    </div>    
				</div>

			</div>
		</div>
		</body>
		</html>