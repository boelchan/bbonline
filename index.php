<html>
	<head>
		<title>Online
		</title>
		<link type="text/css" rel="stylesheet" href="css/style.css"> 


	</head>
	<body>
		<div id="header">
			<div id="logo">
				<label class="judul"><u><b>LESTARI</b></u></label><br>
				<label class="j2"> Online Shop</label><br>
				<label class="j3"> Bahan Bangunan</label>
			</div>
			<div id="menu">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="index.php?page=log_in">Log In</a></li>
					<li><a href="index.php?page=sign_up">Sign Up</a></li>
					<li><a href="index.php?page=about">About</a></li>
				</ul>
			</div>
		</div>
		<div id="content">
			<div id="con_kiri">
				<?php
					include "master/menu_samping/m_user.php";
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