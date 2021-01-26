<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$act =$_GET["act"];
	switch($act){
		default:
			$select=mysql_query("select * from tb_jenis ;");
			
			?>
			<h1>JENIS PRODUK</h1>		
			<hr size="5" color="#eee">
			<a class="tambah" href="?module=jenis&act=insert">Tambah Jenis Produk</a></td>
				<table>
					<tr>
						<td class="htable" ><b>NO</b></td>
						<td class="htable" ><b>JENIS PRODUK</b></td>
						<td class="htable" ><b>AKSI</b></td>
					</tr>
					<?php
					$no=1;
					
					while ($data=mysql_fetch_array($select)){
					?>
					<tr>
						<td class="stable"><?php echo $no?></td>
						<td class="stable"><?php echo $data['NAMA_J']?></td>
						<td class="stable"><a href="?module=jenis&act=edit&id=<?php echo $data["ID_J"];?>">Edit</a> | 
						<a href="?module=jenis&act=delete&id=<?php echo $data["ID_J"];?>">Del</a></td>
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
			<h2>Jenis Produk</h2>		
			<hr size="5" color="white">
			<h3>Tambah Jenis Produk</h3>
			<hr size="2" color="white">
			<form method="POST" action="?module=jenis&act=insert_code">
				<table>
					<tr>
						<td>Nama Jenis produk</td>
						<td><input class="txt" type="text" name="txt_jenis"></td>
					</tr>
					<tr>
						<td colspan="2">
						<input class="tombolReset" type="reset" value="RESET">
						<input class="tombolSimpan" type="submit" value="SIMPAN" name="ok"></td>
					</tr>
				</table>
			</form>
			<?php
			break;
		
		case "edit":
		
			$id =$_GET["id"];
			$select=mysql_query("select * from tb_jenis where ID_J='$id'");
			$data_produk=mysql_fetch_array($select);
			?>
			<a href="?module=jenis"><h2>JENIS produk</h2></a>		
			<hr size="5" color="white">
			<h3>Edit Jenis produk</h3>
			<hr size="2" color="white">
				<form method="POST" action="?module=jenis&act=edit_code">
				<table>
					<tr>
						<td>Nama Jenis produk</td>
						<td><input class="txt" type="text" name="txt_jenis" value="<?php echo $data_produk['NAMA_J'];?>"></td>
					</tr>
					<tr>
						<td colspan="2">
						<input type="hidden" name="txt_id" value="<?php echo $data_produk['ID_J'];?>">
						<input class="tombolReset" type="reset" value="RESET">
						<input class="tombolSimpan" type="submit" value="SIMPAN" name="ok"></td>
					</tr>
				</table>
			</form>
			<?php
			break;	

		case 'insert_code':
			$jenis = $_POST['txt_jenis'];
				if(	$jenis=="")
				{
					?>
					<script>
					alert("Semua Data Harus Diisi");
					window.location.href = "index.php?module=jenis&act=insert";
					</script>
					<?php
				}else{
					$cek = mysql_query("SELECT * FROM `tb_jenis` WHERE `NAMA_J` LIKE '$jenis'");
					$hasilcek = mysql_num_rows($cek);
					if ($hasilcek<1) {
						$insert=mysql_query("INSERT INTO tb_jenis 
						VALUES (NULL, '$jenis')");			
						if($insert){
							?>
							<script>
							alert("Data Ditambahkan");
							window.location.href = "index.php?module=jenis";
							</script>
							<?php
						}else{
							?>
							<script>
							alert("Gagal");
							window.location.href = "index.php?module=jenis&act=insert";
							</script>
							<?php
						}
					}else{
						?>
						<script>
						alert("Data Jenis Sudah Ada");
						window.location.href = "index.php?module=jenis&act=insert";
						</script>
						<?php	
					}
				}
			break;

		case 'edit_code':
			$id=$_POST['txt_id'];
			$jenis=$_POST['txt_jenis'];
			if(	$jenis=="")
			{
				?>
				<script>
				alert("Semua Data Harus Diisi");
				window.location.href = "?module=jenis&act=edit&id=<?php echo $id;?>";
				</script>
				<?php
			}else{
					$edit=mysql_query("UPDATE tb_jenis SET `NAMA_J` = '$jenis' WHERE ID_J=$id;");			
					if($edit){
						?>
						<script>
						alert("Edit Data Berhasil");
						window.location.href = "?module=jenis";
						</script>
						<?php
					}else{
						?>
						<script>
						alert("Gagal Edit!!");
						window.location.href = "?module=jenis&act=edit&id=<?php echo $id;?>";
						</script>
						<?php
					}							
			}
			break;

		case 'delete':
			$id=$_GET["id"];
			$del=mysql_query("delete from tb_jenis where ID_J='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "?module=jenis";
				</script>
				<?php
			}
			break;
	}
?>