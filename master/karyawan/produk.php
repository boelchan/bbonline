<?php
	session_start();
	$idm=$_SESSION ['username'];
	$id=$_GET['id'];
	$module =$_GET["module"];
	$act =$_GET["act"];

	switch($act){
		default :
			$select = mysql_query("select * from tb_produk order by ID_P desc");
			?>
			<h1>MY PRODUK</h1>
			<hr size="5" color="#eee">
			<a class="tambah" href="?module=produk&act=insert">Tambah Produk</a></td>
				<table >
					<tr>
						<td class="htable">NO</td>
						<td class="htable">ID</td>
						<td class="htable">JENIS</td>
						<td class="htable">NAMA</td>
						<td class="htable">KETERANGAN</td>
						<td class="htable">HARGA</td>
						<td class="htable">AKSI</td>
					</tr>
					<?php
					$no=1;

					while ($data_produk=mysql_fetch_array($select)){
					?>
					<tr>
						<td class="stable"><?php echo $no?></td>
						<td class="stable"><?php echo $data_produk['ID_P']?></td>
						<td class="stable"><?php echo $data_produk['ID_J']?></td>
						<td class="stable"><?php echo $data_produk['NAMA_P']?></td>
						<td class="stable"><?php echo $data_produk['KETERANGAN_P']?></td>
						<td class="stable"><?php echo $data_produk['HARGA_P']?></td>
						<td class="stable"><a href="?module=produk&act=edit&id=<?php echo $data_produk["ID_P"];?>">edit</a> |
						    <a href="?module=produk&act=delete&id=<?php echo $data_produk["ID_P"];?>" onclick=return confirm("yakin??")>hapus</a></td>
					</tr>
					<?php
					$no++;
					}
					?>
				</table>
				<?php
			break;
		
		case "insert":
			?>
			<h1>Tambah Produk</h1>
			<hr size="5" color="white">
			<form method="POST" enctype="multipart/form-data" action="?module=produk&act=insert_code">
				<table>
					<tr bgcolor='white'>
						<td>
							<label>Jenis Produk</label>
							</td>
							<td><select name="txt_idj">
								<option value="">--Jenis Produk--</option>
								<?php 
									$select_jenis = mysql_query("select * from tb_jenis");
									while ($data_jenis = mysql_fetch_array($select_jenis)) {
										?>
										<option value="<?php echo $data_jenis['ID_J']; ?>"><?php echo $data_jenis['NAMA_J']; ?></option>
										<?php 
									}
								?>
							</select>
					</tr>
					<tr bgcolor='F0F0F0'>
						<td>
							<label>Nama Produk</label>
						</td>
						<td>
							<input type="text" name="txt_nama" value="<?php echo $data_produk["NAMA_P"];?>">
						</td>
					</tr>
					<tr bgcolor='white'>
						<td>
							<label>Keterangan</label>
						</td>
						<td>
							<input type="text" name="txt_ket" value="<?php echo $data_produk["KETERANGAN_P"];?>"></td>
					</tr>
					<tr bgcolor='F0F0F0'>
						<td>
							<label>Gambar</label>
						</td>
						<td>
							<input type="file" name="txt_gambar" value="<?php echo $data_produk["GAMBAR_P"];?>"></td>
					</tr>
					<tr bgcolor='white'>
						<td>
							<label>Harga</label>
						</td>
						<td>
							<input type="text" name="txt_harga" value="<?php echo $data_produk["HARGA_P"];?>"></td>
					</tr>
					<tr>
					<input type="hidden" name="id" value="<?php echo $data_produk['ID_P'];?>">
						<td><input class="tombolReset" type="submit" value="Tambah"></td>
					</tr>
				</table>
			</form>
			<?php
			break;
		
		case 'insert_code':
			$jenis=$_POST['txt_idj'];
			$nama=$_POST['txt_nama'];
			$ket=$_POST['txt_ket'];
			$namagambar=$_FILES['txt_gambar']['name'];
			$lokasigambar=$_FILES['txt_gambar']['tmp_name'];
			$harga=$_POST['txt_harga'];

			if(	$jenis==""||
				$nama==""||
				$ket==""||
				$namagambar==""||
				$harga=="" )
			{
				?>
				<script>
				alert("Masi Ada Yang Kosong");
				window.location.href = "index.php?module=produk&act=insert";
				</script>
				<?php
			}else{
				$tgl=date(Yhdhis);
				$namabaru=$tgl.$namagambar;
				$move = move_uploaded_file($lokasigambar,'../../image/'.$namabaru);
				if ($move) {
					# code...
					$insert=mysql_query("INSERT INTO `tb_produk` (`ID_P`, `ID_J`, `NAMA_P`, `KETERANGAN_P`, `GAMBAR_P`, `HARGA_P`) VALUES (
					NULL,
					'$jenis',
					'$nama',
					'$ket',
					'$namabaru',
					'$harga')");

					if($insert){
						?>
						<script>
						alert("Data Ditambahkan");
						window.location.href = "index.php?module=produk";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Gagal");
						window.location.href = "index.php?module=produk&act=insert";
						</script>
						<?php
					}
				}else{
					?>
					<script>
					alert("Ukuran Gmabar Terlalu Besar");
					window.location.href = "index.php?module=produk&act=insert";
					</script>
					<?php
				
				}
			}

			break;

		case 'delete':
			$id=$_GET['id'];
			$del=mysql_query("delete from tb_produk where ID_P='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "index.php?module=produk";
				</script>
				<?php
			}else{
				?>
				<script>
				alert("Data Tidak Boleh Dihapus");
				window.location.href = "index.php?module=produk";
				</script>
				<?php
			}
			break;

		case "edit":
			
			$id =$_GET["id"];
			$select=mysql_query("select * from tb_produk where ID_P='$id'");
			$data_produk=mysql_fetch_array($select);
			$jx=$data_produk['ID_J'];
			?>
			<h1>Edit Produk </h1>
			<hr size="5" color="white">
			<form method="POST" enctype="multipart/form-data" action="?module=produk&act=edit_code">
				<table>
					<tr bgcolor='F0F0F0'>
						<td>ID</td>
						<td><input type="text" name="txt_id" value="<?php echo $data_produk['ID_P']?>" readonly=""></td>
					<tr bgcolor='white'>
						<td>Jenis</td>
						<td>
							<select name="txt_idj">
								<?php  
									$selectj = mysql_query("select * from tb_jenis where ID_J = $jx");
									$data_j=mysql_fetch_array($selectj);
								?>
								<option value="<?php echo $data_j['ID_J']; ?>"><?php echo $data_j['NAMA_J']; ?></option>

								<option value="">-------------</option>
								<?php 
									$select_jenis = mysql_query("select * from tb_jenis");
									while ($data_jenis = mysql_fetch_array($select_jenis)) {
										?>
										<option value="<?php echo $data_jenis['ID_J']; ?>"><?php echo $data_jenis['NAMA_J']; ?></option>
										<?php 
									}
								?>
							</select>
						</td>
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
						<td><input type="file" name="txt_gambar" value="<?php echo $data_produk["GAMBAR_P"];?>"></td>
					</tr>
					<tr bgcolor='white'>
						<td>HARGA</td>
						<td><input type="text" name="txt_harga" value="<?php echo $data_produk["HARGA_P"];?>"></td>
					</tr>
					<tr>
					<input type="hidden" name="id" value="<?php echo $data_produk['ID_P'];?>">
						<td><input type="submit" value="Edit"></td>
					</tr>
				</table>
			</form>
			<?php

		case 'edit_code':
			$jenis=$_POST['txt_idj'];
			$nama=$_POST['txt_nama'];
			$ket=$_POST['txt_ket'];
			$harga=$_POST['txt_harga'];
			$namagambar=$_FILES['txt_gambar']['name'];
			$lokasigambar=$_FILES['txt_gambar']['tmp_name'];
			$id=$_POST['txt_id'];

			if(	$jenis==""||
				$nama==""||
				$ket==""||
				$namagambar==""||
				$harga=="")
			{				
				// ?>
				// <script>
				// alert("Masi Ada Yang Kosong");
				// 	window.location.href = "?module=produk&act=edit&id=<?php echo $id; ?>";
				// </script>
				// <?php
			}else{
				$tgl=date(Yhdhis);
				$namabaru=$tgl.$namagambar;
				$move = move_uploaded_file($lokasigambar,'../../image/'.$namabaru);
				if ($move) {
					$update=mysql_query("UPDATE tb_produk set
					ID_J='$jenis',
					NAMA_P='$nama',
					KETERANGAN_P='$ket',
					GAMBAR_P='$namabaru',
					HARGA_P='$harga'
					where ID_P=$id");

					if($update){
						?>
						<script>
						alert("UPDATED");
						window.location.href = "index.php?module=produk";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("UPDATE FAILED");
						window.location.href = "?module=produk&act=edit&id=<?php echo $id; ?>";
						</script>
						<?php
					}					
				}else{
					?>
					<script>
					alert("Ukuran Gambar lebih dari 2Mb");
					window.location.href = "?module=produk&act=edit&id=<?php echo $id; ?>";
					</script>
					<?php
				}
			}					
			break;	
	}
?>