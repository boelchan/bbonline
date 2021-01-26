<?php
	session_start();
	include '../koneksi.php';
	$user = $_SESSION['username'];
	$level = $_SESSION['level'];
	if ( $user == "" || $level ==""){
		?>
		<script>
		alert("Silahkan Login Dulu");
		window.location.href = "../../index.php?page=log_in";
		</script>
		<?php
	} elseif ($level != 'karyawan') {
		?>
		<script>
		alert("Silahkan Login Dulu");
		window.location.href = "../../index.php?page=log_in";
		</script>
		<?php
	} else{
		?>
		<html>
			<head>
				<title>Online
				</title>
				<link type="text/css" rel="stylesheet" href="../../css/style.css"> 
			</head>
			<body>
				<div id="header">
					<div id="logo">
				<label class="judul"><u><b>LESTARI</b></u></label><br>
				<label class="j2"> Online Shop</label><br>
				<label class="j3"> Bahan Bangunan</label>
			</div>
					<div id="menu">
						<?php
						include "../nav.php";
						?>
					</div>
				</div>
				<div id="content">
					<div id="con_kiri">
						<?php
							include "../menu_samping/m_karyawan.php";
						?>
					</div>
					<div id="con_kanan">
						<?php
							include "content.php";
						?>
					</div>
				</div>
				<div id="footer">
				</div>
			</body>
		</html>
		<?php
	}
?>