<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	
	$idm = $_SESSION ['username'];
	$id = $_GET['id'];

	$module =$_GET["module"];
	$act =$_GET["act"];

	switch ($act){

		default:
			$select = mysql_query("select * from tb_produk order by ID_P desc");
			?>
			<h1>PRODUKkuu</h1>
			<hr size="5" color="#eee">
			<a class="tambah" href="aksi.php?module=transaksi&act=insert"><b>Beli Lagi !!!</b></a>
			<?php
					echo "<br>";
				while ($data_produk=mysql_fetch_array($select)){
					?>
					<ul class="produk">
						<li><b><?php echo $data_produk['NAMA_P']?></b></li>
						<li><img width="100px" height="100px" src="../../image/<?php echo $data_produk['GAMBAR_P']?>"></li>
						<li><?php echo $data_produk['HARGA_P']?></li>
					</ul>
				<?php
					}
			break;
		
		case "insert":
				?>
		<h1>pesan</h1>
		<hr size="5" color="white">
		<form method="POST" action="aksi.php?module=member&act=insert">
			<table>
				<tr bgcolor='white'>
					<td>JENIS</td>
					<td><input type="text" name="txt_idj" value="<?php echo $data_produk["ID_J"];?>"></td>
				</tr>
				<tr bgcolor='F0F0F0'>
					<td>NAMA</td>
					<td><input type="text" name="txt_nama" value="<?php echo $data_produk["NAMA_P"];?>"></td>
				</tr>
				<tr bgcolor='white'>
					<td>KETERANGAN</td>
					<td><input type="text" name="txt_ket" value="<?php echo $data_produk["KETERANGAN_P"];?>"></td>
				</tr>
				<tr bgcolor='F0F0F0'>
					<td>GAMBAR</td>
					<td><input type="text" name="txt_gambar" value="<?php echo $data_produk["GAMBAR_P"];?>"></td>
				</tr>
				<tr bgcolor='white'>
					<td>HARGA</td>
					<td><input type="text" name="txt_harga" value="<?php echo $data_produk["HARGA_P"];?>"></td>
				</tr>
				<tr>
				<input type="hidden" name="id" value="<?php echo $data_produk['ID_P'];?>">
					<td><input type="submit" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
		<?php
		break;
		
		case "edit":
		
		$id =$_GET["id"];
		$select=mysql_query("select * from tb_produk where ID_P='$id'");
		$data_produk=mysql_fetch_array($select);
		?>
		<h1>EDIT PRODUK</h1>
		<hr size="5" color="white">
		<form method="POST" action="aksi.php?module=produk&act=edit">
			<table>
				<tr bgcolor='F0F0F0'>
					<td>ID</td>
					<td><input type="text" name="txt_id_p" value="<?php echo $data_produk['ID_P']?>" readonly=""></td>
				<tr bgcolor='white'>
					<td>JENIS</td>
					<td><input type="text" name="txt_idj" value="<?php echo $data_produk["ID_J"];?>"></td>
				<tr bgcolor='F0F0F0'>
					<td>NAMA</td>
					<td><input type="text" name="txt_nama" value="<?php echo $data_produk["NAMA_P"];?>"></td>
				</tr>
				<tr bgcolor='white'>
					<td>KETERANGAN</td>
					<td><input type="text" name="txt_ket" value="<?php echo $data_produk["KETERANGAN_P"];?>"></td>
				</tr>
				<tr bgcolor='F0F0F0'>
					<td>GAMBAR</td>
					<td><input type="text" name="txt_gambar" value="<?php echo $data_produk["GAMBAR_P"];?>"></td>
				</tr>
				<tr bgcolor='white'>
					<td>HARGA</td>
					<td><input type="text" name="txt_harga" value="<?php echo $data_produk["HARGA_P"];?>"></td>
				</tr>
				<tr>
				<input type="hidden" name="id" value="<?php echo $data_produk['ID_P'];?>">
					<td><input type="submit" value="SIMPAN"></td>
				</tr>
			</table>
		</form>
		<?php
		break;
	}
?>