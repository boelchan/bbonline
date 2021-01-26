<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$id=$_SESSION ['username'];
	$module =$_GET["module"];
	$act =$_GET["act"];
	switch($act){
		default:
		$select_user=mysql_query("select * from tb_user where USERNAME='$id'");
		$data_user=mysql_fetch_array($select_user);
		?>
		<h1>PROFILKU</h1>
		<hr size="5" color="#eee">
			<table>
				<tr bgcolor='F0F0F0'>
					<td>Nama Lengkap</td>
					<td><?php echo $data_user["NAMA"];?></td>
				</tr>
				<tr bgcolor='white'>
					<td>Tempat Lahir</td>
					<td><?php echo $data_user["TMP_LAHIR"];?></td>
				</tr>
				<tr bgcolor='F0F0F0'>
					<td>Tanggal Lahir</td>
					<td><?php echo $data_user["TGL_LAHIR"];?></td>
				</tr>
				<tr bgcolor='white'>
					<td>Jenis Kelamin</td>
					<td><?php 
						if ($data_user["JK"]==1) {
							echo "Laki-laki";
						}else{
							echo "Perempuan";
						}
					 ;?></td>
				</tr>
				<tr bgcolor='F0F0F0'>
					<td>Alamat</td>
					<td><?php echo $data_user["ALAMAT"];?></td>			
				</tr>
				<tr bgcolor='white'>
					<td>Kota</td>
					<td><?php echo $data_user["KOTA"];?></td>
				</tr>
				<tr>
					<td><a href="?module=profil&act=edit&id=<?php echo $id;?>">EDIT</a></td>
				</tr>
			</table>
			<?php
		break;
		
		case "edit":
			$id =$_GET["id"];
			$select_user=mysql_query("select * from tb_user where USERNAME='$id'");
			$data_user=mysql_fetch_array($select_user);
			?>
			<h1>EDIT PROFILE</h1>
			<hr size="5" color="white">
			<form method="POST" action="?module=profil&act=edit_code">
				<table>
					<tr bgcolor='F0F0F0'>
						<td>Nama Lengkap</td>
						<td><input type="text" name="txt_nama" value="<?php echo $data_user["NAMA"];?>"></td>
					</tr>
					<tr bgcolor='white'>
						<td>Tempat Lahir</td>
						<td><input type="text" name="txt_tmp_lahir" value="<?php echo $data_user["TMP_LAHIR"];?>"></td>
					</tr>
					<tr bgcolor='F0F0F0'>
						<td>Tanggal Lahir</td>
						<td><input type="text" name="txt_tgl_lahir" value="<?php echo $data_user["TGL_LAHIR"];?>"></td>
					</tr>
					<tr bgcolor='white'>
						<td>Jenis Kelamin</td>
						<td><?php echo $data_user["JK"];?></td>
					</tr>
					<tr bgcolor='F0F0F0'>
						<td>Alamat</td>
						<td><input type="text" name="txt_alamat" value="<?php echo $data_user["ALAMAT"];?>"></td>
					</tr>
					<tr bgcolor='white'>
						<td>Kota</td>
						<td><input type="text" name="txt_kota" value="<?php echo $data_user["KOTA"];?>"></td>
					</tr>
					<tr>
					<input type="hidden" name="id" value="<?php echo $data_user['USERNAME'];?>">
						<td><input type="submit" value="SIMPAN"></td>
					</tr>
				</table>
			</form>
			<?php
			break;

		case 'edit_code':
			$id=$_POST["id"];
			$nama=$_POST['txt_nama'];
			$tmp_lahir=$_POST['txt_tmp_lahir'];
			$tgl_lahir=$_POST['txt_tgl_lahir'];
			$alamat=$_POST['txt_alamat'];
			$kota=$_POST['txt_kota'];
			if(	$nama==""||
				$tmp_lahir==""||
				$tgl_lahir==""||
				$alamat=="" ||
				$kota=="")
			{
				?>
				<script>
				alert("Masi Ada Yang Kosong");
					window.location.href = "?module=profil&act=edit&id=<?php echo $id ?>";
				</script>
				<?php
			}else{
				$edit=mysql_query("update tb_user set
				NAMA='$nama',
				TMP_LAHIR='$tmp_lahir',
				TGL_LAHIR='$tgl_lahir',
				ALAMAT='$alamat',
				KOTA='$kota' where USERNAME='$id'");
				if($edit){
					?>
					<script>
					alert("UPDATED");
					window.location.href = "index.php?module=profil";
					</script>
					<?php
				}else{
					?>
					<script>
					alert("UPDATE FAILED");
					window.location.href = "index.php?module=profil&act=edit&id=<?php echo $id ?>";
					</script>
					<?php
				}
			}
			break;

	}

	?>
		
