<?php
	error_reporting(1);

	$module=$_GET["module"];
	
	switch($module){
		default:
				include "produk.php";
			break;
		
		case "profil":
				include "profil.php";
				break;
				
		case "produk":
				include "produk.php";
				break;
		
		case "info":
				include "info.php";
				break;
		
		case "detail":
				include "detail.php";
				break;
		
		case "pesan":
			include "data_transaksi.php";
			break;	
		case "pembayaran":
			include "pembayaran.php";
			break;	
}
?>