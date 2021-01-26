<h1>Detail Pembelian</h1>
<hr size="5" color="#eee">

<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$id =$_GET["id"];
	
	$select_trans=mysql_query("select * from tb_transaksi where ID_T='$id'");
	$data_trans=mysql_fetch_array($select_trans);
	$status=$data_trans["STATUS"];

	switch ($status) {
		case '0':
			?>
	 		<a href="?module=detail&act=verifikasi&id=<?php echo $id;?>" class="tambah">Verifikasi</a>	
	 		<?php
			break;
		

		case '1':
			?>
	 		<a href="?module=detail&act=hapusverifikasi&id=<?php echo $id;?>" class="tambah">Hapus Verifikasi</a>	
	 		<?php
			break;
	}

	$act=$_GET['act'];
	switch ($act) {
		case 'verifikasi':
			$id_t=$_GET["id"];
			$query=mysql_query("UPDATE tb_transaksi set STATUS=1 where ID_T='$id_t'");
			?>
			<script>
			alert("telah diverifikasi");
			window.location.href = "index.php?module=detail&id=<?php echo $id_t;?>";
			</script>
			<?php
			break;

		case 'hapusverifikasi':
			$id_t=$_GET["id"];
			$query=mysql_query("UPDATE tb_transaksi set STATUS=0 where ID_T='$id_t'");
			?>
			<script>
			alert("verifikasi telah dihapus");
			window.location.href = "index.php?module=detail&id=<?php echo $id_t;?>";
			</script>
			<?php
			break;
	}

	$select=mysql_query("select * from tb_produk");
			$sel=mysql_query("select * from tb_transaksi where ID_T='$id'");
	    	$data_t=mysql_fetch_array($sel);

	?>
	<table>
	<tr>
		<td class="htable">No</td>
		<td class="htable">Produk</td>
		<td class="htable">Harga</td>
		<td class="htable">Jumlah</td>
		<td class="htable">Harga Total</td>
	</tr>
	<?php
		$select=mysql_query("select * from tb_detail where ID_T='$id'");
		$no=0;
		while($data_detail=mysql_fetch_array($select)){
			$no++;
			$id_pro=$data_detail["ID_P"];
			$select_pro=mysql_query("select * from tb_produk where ID_P='$id_pro'");
			$data_pro=mysql_fetch_array($select_pro);
			?>
			<tr>
				<td class="stable"><?php echo $no;?></td>
				<td class="stable"><?php echo $data_pro['NAMA_P'];?></td>
				<td class="stable"><?php echo $data_pro['HARGA_P'];?></td>
				<td class="stable"><?php echo $data_detail['JUMLAH'];?></td>
				<td class="stable"><?php echo $data_detail['TOTAL_D'];?></td>
			</tr>
			<?php
		}
	?>
	</table>
	<hr>
	<table>
		<tr>
			<td>Lokasi</td>
			<td><b><?php echo $data_t['lokasi']; ?></b></td>
		</tr>
		<tr>
			<td>No Rek</td>
			<td><b><?php echo $data_t['norek']; ?></b></td>
		</tr>
		<tr>
			<td>a.n</td>
			<td><b><?php echo $data_t['an']; ?></b></td>
		</tr>
	</table>