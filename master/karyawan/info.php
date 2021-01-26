<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$idm=$_SESSION ['username'];
	$id=$_GET['id'];
	$module =$_GET["module"];
	$act =$_GET["act"];
	switch($act){
		default:
			$select=mysql_query("select * from tb_info");
			
			?>
			<h1>INFO BARU</h1>
			<hr size="5" color="#eee">
			<a class="tambah"  href="?module=info&act=insert">Tambah Info</a>
				<table>
					<tr>
						<td class="htable">NO</td>
						<td class="htable">ID</td>
						<td class="htable">JUDUL</td>
						<td class="htable">ISI</td>
						<td class="htable">AKSI</td>
					</tr>
					<?php
					$no=1;

					while ($data=mysql_fetch_array($select)){
					?>
					<tr>
						<td class="stable"><?php echo $no?></td>
						<td class="stable"><?php echo $data['ID_INFO']?></td>
						<td class="stable"><?php echo $data['JUDUL']?></td>
						<td class="stable"><?php echo $data['ISI']?></td>
						<td class="stable"><a href="?module=info&act=edit&id=<?php echo $data["ID_INFO"];?>">edit</a> | 
										   <a href="?module=info&act=delete&id=<?php echo $data["ID_INFO"];?>" onclick=return confirm("yakin??")>hapus</a></td>
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
			<h1>INSERT INFO</h1>
			<hr size="5" color="white">
			<form method="POST" action="?module=info&act=insert_code">
				<table>
					<tr bgcolor='white'>
						<td>JUDUL</td>
						<td><input type="text" name="txt_judul"></td>
					</tr>
					<tr bgcolor='F0F0F0'>
						<td>ISI</td>
						<td><textarea name="txt_isi"></textarea></td>
					</tr>
					<tr>
						<td><input type="submit" value="SIMPAN"></td>
					</tr>
				</table>
			</form>
			<?php
			break;
		
		case 'insert_code':
			$judul=$_POST['txt_judul'];
			$isi=$_POST['txt_isi'];
			if(	$judul==""||
				$isi=="" )
			{
				?>
				<script>
				alert("Masi Ada Yang Kosong");
				window.location.href = "index.php?module=info&act=insert";
				</script>
				<?php
			}else{
				$insert=mysql_query("INSERT INTO `tb_info` (`ID_INFO`, `JUDUL`, `ISI`) 
					VALUES (
					NULL,
					'$judul',
					'$isi')");
				if($insert){
					?>
					<script>
					alert("Info Ditambahkan");
					window.location.href = "index.php?module=info";
					</script>
					<?php
				}else{
					?>
					<script>
					alert("Info Gagal Ditambahkan");
					window.location.href = "index.php?module=info&act=insert";
					</script>
					<?php
				}
			}
			break;
		case "edit":
		
			$id =$_GET["id"];
			$select=mysql_query("select * from tb_info where ID_INFO='$id'");
			$data=mysql_fetch_array($select);
			?>
			
			<h1>EDIT INFO</h1>
			<hr size="5" color="white">
			<form method="POST" action="?module=info&act=edit_code">
				<table>
					<tr bgcolor='F0F0F0'>
						<td>ID</td>
						<td><input type="text" name="txt_id" value="<?php echo $data['ID_INFO']?>" readonly=""></td>
					<tr bgcolor='white'>
						<td>JUDUL</td>
						<td><input type="text" name="txt_judul" value="<?php echo $data["JUDUL"];?>"></td>
					<tr bgcolor='F0F0F0'>
						<td>ISI</td>
						<td><input type="text" name="txt_isi" value="<?php echo $data["ISI"];?>"></td>
					</tr>
					<tr>
					<input type="hidden" name="id" value="<?php echo $data['ID_INFO'];?>">
						<td><input type="submit" value="SIMPAN"></td>
					</tr>
				</table>
			</form>
			<?php
			break;

		case 'edit_code':
			$id=$_POST['id'];
			$judul=$_POST['txt_judul'];
			$isi=$_POST['txt_isi'];
			if(	$judul==""||
				$isi=="")
			{
				?>
				<script>
				alert("Masi Ada Yang Kosong");
				window.location.href = "index.php?module=info&act=edit&id=<?php echo $id; ?>";
				</script>
				<?php
			}else{
				$edit=mysql_query("UPDATE `db_bbonline`.`tb_info` SET 
					`JUDUL` = '$judul', 
					`ISI` = '$isi' 
					WHERE `tb_info`.`ID_INFO` ='$id'");
				
				if($edit){
					?>
					<script>
					alert("UPDATED");
					window.location.href = "index.php?module=info ";
					</script>
					<?php
				}else{
					?>
					<script>
					alert("UPDATE FAILED");
					window.location.href = "index.php?module=info&act=edit&id=<?php echo $id; ?>";
					</script>
					<?php
				}
			}
			break;

		case 'delete':
			$id=$_GET['id'];
			$del=mysql_query("delete from tb_info where ID_INFO='$id'");
			if($del){
				?>
				<script>
				alert("DELETED");
				window.location.href = "index.php?module=info";
				</script>
				<?php
			}
			break;
	}
?>