<?php
	error_reporting(1);
	include "koneksi.php";
	$page=$_GET["page"];

	switch($page){
		default:
			$select = mysql_query("select * from tb_produk order by ID_P desc");
			?>
			<h1>PRODUKKU</h1>
			<hr size="5" color="#eee">
			<a href="?page=log_in" class="tambah">Beli ???</a>
			<br>
			<?php
				while ($data_produk=mysql_fetch_array($select)){
					?>
					<ul class="produk">
						<li><b><?php echo $data_produk['NAMA_P']?></b></li>
						<li><img width="100px" height="100px" src="image/<?php echo $data_produk['GAMBAR_P']?>"></li>
						<li><?php echo $data_produk['HARGA_P']?></li>
					</ul>
				<?php
			}
		break;

		case "log_in":
			include "login.php";
		break;
		case "sign_up":
			include "signup.php";
		break;
		case "about":
			include "about.php";
		break;
	}
?>