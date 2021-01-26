<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$act=$_GET['act'];
	switch ($act) {
		case 'kirim':
			$id_t=$_GET["id"];
			$query=mysql_query("UPDATE `db_bbonline`.`tb_transaksi` SET `status_pengiriman` = 'Dikirim' WHERE `tb_transaksi`.`ID_T` = $id_t");
			if ($query) {
				?>
				<script>
				alert("Telah Dikirm");
				window.location.href = "index.php?module=data_tran";
				</script>
			<?php
			}
			break;
		case 'bayar':
			$id_t=$_GET["id"];
			$query=mysql_query("UPDATE `db_bbonline`.`tb_transaksi` SET `bayar` = 'Lunas' WHERE `tb_transaksi`.`ID_T` = $id_t");
			if ($query) {
				?>
				<script>
				alert("LUNAS");
				window.location.href = "index.php?module=data_tran";
				</script>
			<?php
			}
			break;
	}
	$select=mysql_query("select * from tb_transaksi order by ID_T desc");
	?>
	<h1>DATA PEMBELIAN</h1>
	<hr size="5" color="#eee">
	<table>
		<tr>
			<td class="htable">NO</td>
			<td class="htable" >NO NOTA</td>
			<td class="htable" >USERNAME</td>
			<td class="htable" >TANGGAL</td>
			<td class="htable" >TOTAL</td>
			<td class="htable" >S NOTA</td>
			<td class="htable" >S BAYAR</td>
			<td class="htable" >S PENGIRIMAN</td>
			<td class="htable" >AKSI</td>
		</tr>
		<?php
		$no=1;			
		
		while ($data=mysql_fetch_array($select)){
			
		?>
		<tr>
			<td class="stable" ><?php echo $no?></td>
			<td class="stable" ><?php echo $data['ID_T']?></td>
			<td class="stable" ><?php echo $data['USERNAME']?></td>
			<td class="stable" ><?php echo $data['TGL_T']?></td>
			<td class="stable" ><?php echo $data['TOTAL_T']?></td>
			<td class="stable" ><?php echo $data['STATUS']?></td>
			<td class="stable" ><?php echo $data['bayar']?></td>
			<td class="stable" ><?php echo $data['status_pengiriman']?></td>
			<td class="stable" ><a href="?module=data_tran&act=bayar&id=<?php echo $data["ID_T"];?>" >Lunas</a> | 
								<a href="?module=data_tran&act=kirim&id=<?php echo $data["ID_T"];?>" >kirim</a> | 
								<a href="?module=detail&id=<?php echo $data["ID_T"];?>" >Detail</a></td>
			
		</tr>
		<?php
		$no++;
		}
		?>
	</table>