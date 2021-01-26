<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include "../../..koneksi.php";
	session_start();
	include "koneksi.php";
?>
<ul>					
	<li><a href="index.php?module=produk">Produk</a></li>
	<li><a href="index.php?module=jenis">Jenis Produk</a></li>
	<li><a href="index.php?module=data_tran">Data Pesanan</a></li>
	<li><a href="index.php?module=info">Berita</a></li>
	<li><a href="index.php?module=data_member">Data Member</a></li>
	<li><a href="index.php?module=profil">Profil</a></li>
</ul>