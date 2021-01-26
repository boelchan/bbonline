<h1>Detail Pembelian</h1>
<hr size="5" color="#eee">

<?php
	session_start();
	$id =$_GET["id"];
	$select = mysql_query('select * form tb_transaksi where ID_T=$id');
	$data = mysql_fetch_array($select);
	?>
		<form method="POST" action="aksi.php?module=detail&act=verifikasi&id=<?php echo $id;?>">
			<table>
				<tr>
					<td>Lokasi</td>
					<td><input style="width:400px;" type="text" name="lokasi" value="<?php echo $data['lokasi'] ?>"></td>
				<tr>
					<td>No Rek</td>
					<td><input type="text" name="norek" value="<?php echo $data['norek'] ?>"></td>
				</tr>
				<tr>
					<td>a.n</td>
					<td><input type="text" name="an" value="<?php echo $data['an'] ?>"></td>
				</tr>
			</table>
		<hr>
		<a class="tambah" href="?module=detail&id=<?php echo $id;?>">Kembali</a>
		<input class="tambah" type="submit" value="Validasi">
		<hr>
		</form>


		<?php 
?>