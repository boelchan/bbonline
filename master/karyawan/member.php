<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	include "../../../../koneksi.php";
	session_start();

	$id =$_GET["id"];
	$module =$_GET["module"];
	$act =$_GET["act"];
	
	$select_user=mysql_query("select * from tb_user where LEVEL='member'");
	$data_user=mysql_fetch_array($select_user);
	?>
	<h1>DATA MEMBER</h1>
	<hr size="5" color="#eee">
	<form>
		<table>
			<tr align="center">
				<td class="htable"><b>NAMA LENGKAP</b></td>
				<td class="htable"><b>TEMPAT LAHIR</b></td>
				<td class="htable"><b>TANGGAL LAHIR</b></td>
				<td class="htable"><b>JENIS KELAMIN</b></td>
				<td class="htable"><b>ALAMAT</b></td>
				<td class="htable"><b>KOTA</b></td>
				<td class="htable"><b>AKSI</b></td>
			</tr>
			<?php
			$select_mem=mysql_query("select * from tb_user where LEVEL='member'");
			while($data_user=mysql_fetch_array($select_mem)){
			?>
			<tr><td class="stable"><?php echo $data_user["NAMA"];?></td>
				<td class="stable"><?php echo $data_user["TMP_LAHIR"];?></td>
				<td class="stable"><?php echo $data_user["TGL_LAHIR"];?></td>
				<td class="stable"><?php echo $data_user["JK"];?></td>
				<td class="stable"><?php echo $data_user["ALAMAT"];?></td>			
				<td class="stable"><?php echo $data_user["KOTA"];?></td>
				<td class="stable"><a href="aksi.php?module=karyawan&act=delete&idm=<?php echo $data_user['USERNAME'];?>" onclick=return confirm("yakin ???")>hapus</a></td>
			</tr>
			<?php
			}
			?>
		</table>
	</form>