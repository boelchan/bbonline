<?php
	session_start();
	include '../koneksi.php';
	$user = $_SESSION['username'];
	$level = $_SESSION['level'];
	if ( $user == "" || $level ==""){
		echo "login dulu";
	} else {
	
	
?>
<html>
	<head>
		<title>Jarcom Bakery Online
		</title>
		<link type="text/css" rel="stylesheet" href="../css/style.css"> 
	</head>
	<body>
		<div id="header">
			<div id="logo">
			</div>
			<div id="menu">
				<?php
				include "menu_atas/m_member.php";
				?>
			</div>
		</div>
		<div id="content">
			<div id="con_kiri">
				<?php
					if($level=='admin'){
						include "menu_samping/m_admin.php";
					}
					else if($level=='karyawan'){
						include "menu_samping/m_karyawan.php";
					}
					else if($level=='member'){
						include "menu_samping/m_member.php";
					}
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