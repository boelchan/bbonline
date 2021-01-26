<?php
	error_reporting(0);
	$module=$_GET["module"];
	switch($module){
		default:
			?>
			<h1>Selamat Datang</h1>
			<?php
		break;
		case "profil":
				include "profil.php";
			break;
		case "data_member":
				include "member.php";
			break;
		case "jenis":
				include "jb.php";
			break;

		case "produk":
				include "produk.php";
			break;
		case "info":
				include "info.php";
			break;
		case "data_tran":
				include "data_transaksi.php";
			break;
		
		case "detail":
				include "detail.php";
			break;

	}
?>