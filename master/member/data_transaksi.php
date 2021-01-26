<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$idm=$_SESSION ['username'];
	$id=$_GET['id'];
	$module =$_GET["module"];
	$act =$_GET["act"];
	switch($act){
		default:
		$select=mysql_query("select * from tb_transaksi where USERNAME='$idm' order by TGL_T desc");
		?>
		<h1>KERANJANG PEMBELIAN</h1>
		<hr size="5" color="#eee">
		<a class="tambah" href="aksi.php?module=transaksi&act=insert"><b>Beli Lagi !!!</b></a></td>
			<table>
				<tr>
					<td class="htable">NO</td>
					<td class="htable">ID NOTA</td>
					<td class="htable">TANGGAL</td>
					<td class="htable">TOTAL</td>
					<td class="htable">S BAYAR</td>
					<td class="htable">S PENGIRIMAN</td>
					<td class="htable">AKSI</td>
				</tr>
				<?php
				$no=1;			
				
				while ($data=mysql_fetch_array($select)){
					
				?>
				<tr>
					<td class="stable"><?php echo $no?></td>
					<td class="stable"><?php echo $data['ID_T']?></td>
					<td class="stable"><?php echo $data['TGL_T']?></td>
					<td class="stable"><?php echo $data['TOTAL_T']?></td>
					<td class="stable"><?php echo $data['bayar']?></td>
					<td class="stable"><?php echo $data['status_pengiriman']?></td>
					<td class="stable"><a href="?module=detail&id=<?php echo $data["ID_T"];?>">Detail</a></td>
					
				</tr>
				<?php
				$no++;
				}
				?>
			</table>
			<?php
		break;
	}
?>