<h1>Detail Pembelian</h1>
<hr size="5" color="#eee">

<?php
	$act=$_GET['act'];
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$idm=$_SESSION["username"];
	$id =$_GET["id"];
	$select_trans=mysql_query("select * from tb_transaksi where USERNAME='$idm' && ID_T='$id'");
	$data_trans=mysql_fetch_array($select_trans);
	$status=$data_trans["STATUS"];
	

	if ($status==0){
		$select=mysql_query("select * from tb_produk");

		?>
		<form method="POST" action="aksi.php?module=detail&act=insert">
			<table>
				<tr bgcolor='F0F0F0'>
					<td>No Transaksi</td>
					<td><?php echo $id;?></td>
				<tr bgcolor='F0F0F0'>
					<td>Produk</td>
					<td><select name="produk">
						<option value="">--Pilih Barang--</option>
						<?php
						while($data_produk=mysql_fetch_array($select)){
							?>
							<option value="<?php echo $data_produk["ID_P"];?>"><?php echo $data_produk["NAMA_P"];?></option>
							<?php
						}
						?>
					</select></td>
				</tr>
				<tr bgcolor='white'>
					<td>Jml</td>
					<td><select name="jumlah">
						<option value="">--Jumlah--</option>
						<?php
							for($a=1;$a<=10;$a++){
							?>
							<option value="<?php echo $a;?>"><?php echo $a;?></option>
							<?php
							}
						?>
					</select></td>
				</tr>
				<tr>
				<input type="hidden" name="id" value="<?php echo $id;?>">
					<td><input type="submit" value="Tambah"></td>
				</tr>
			</table>
		</form>
		<hr>
		<?php

		// lihat detail

		$select_trans=mysql_query("select * from tb_transaksi where USERNAME='$idm' && ID_T='$id'");
		$data_trans=mysql_fetch_array($select_trans);
		$status=$data_trans["STATUS"];
		?>
		<table>
		<tr>
			<td class="htable">No</td>
			<td class="htable">Produk</td>
			<td class="htable">Harga</td>
			<td class="htable">Jumlah</td>
			<td class="htable">Harga Total</td>
			<td class="htable">Pilihan</td>
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
					<td class="stable"><a href="aksi.php?module=detail&act=hapusdetail&id=<?php echo $id; ?>&idd=<?php echo $data_detail['ID_D']; ?>">hapus</a></td>
				</tr>
				<?php
			}
		?>
		</table>
		<hr>
		<a class="tambah" href="?module=pembayaran&id=<?php echo $id; ?>">Lanjutkan Pembayaran</a>
		<hr>
			<?php
	}elseif ($status==1) {
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

		$sel=mysql_query("select * from tb_transaksi where ID_T='$id'");
		$data_t=mysql_fetch_array($sel);

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
		<hr>
		<a class="tambah" href="javascript:void(0);"onclick="window.open('report.php?kode=<?php echo $id; ?>','nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')">Cetak</a> 
		<hr>
		<?php
	}
?>