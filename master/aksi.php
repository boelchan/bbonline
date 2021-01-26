<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		include "../koneksi.php";
	$module=$_GET["module"];
	$act=$_GET["act"];
	
	if($module=="karyawan" and $act=="edit"){
		$id=$_POST["aa"];
				$password=md5($_POST['txt_pass']);
				$nama=$_POST['txt_nama'];
				$tmp_lahir=$_POST['txt_tmp_lahir'];
				$tgl_lahir=$_POST['txt_tgl_lahir'];
				$alamat=$_POST['txt_alamat'];
				$kota=$_POST['txt_kota'];
				if(	$password==""||
					$nama==""||
					$tmp_lahir==""||
					$tgl_lahir==""||
					$alamat=="" ||
					$kota=="")
				{
					echo "ada yang kosong";
				}else{
					$edit=mysql_query("update tb_user set
				PASSWORD='$password',
				NAMA='$nama',
				TMP_LAHIR='$tmp_lahir',
				TGL_LAHIR='$tgl_lahir',
				ALAMAT='$alamat',
				KOTA='$kota' where USERNAME='$id'");
					if($edit){
						echo "berhasil";
					}else{
						?>
						<script>
							alert("gagal");
							window.location.href = "index.php?id=<?php echo $id?>&module=profil";
						</script>
						<?php
					}
				}
	}else if($module=="karyawan" && $act=="delete"){
		$idm=$_GET["idm"];
				$del=mysql_query("delete from tb_user where USERNAME='$idm'");
				if($del){
					?>
					<script>
					alert("berhasil");
					window.location.href = "index.php?id=<?php echo $id?>&module=data_member";
					</script>
			<?php
				}
	}else if($module=="signup"){
		$username=$_POST['txt_user'];
			$password=md5($_POST['txt_pass']);
			$nama=$_POST['txt_nama'];
			$tmp_lahir=$_POST['txt_tmp_lahir'];
			$tgl=$_POST['tgl'];
			$bln=$_POST['bln'];
			$thn=$_POST['thn'];
			$jk=$_POST['txt_jk'];
			$alamat=$_POST['txt_alamat'];
			$kota=$_POST['txt_kota'];
			$level="member";
			if($username=="" ||
				$password==""||
				$nama==""||
				$tmp_lahir==""||
				$tgl==""||
				$bln==""||
				$thn==""||
				$jk==""||
				$alamat=="" ||
				$kota=="")
			{
				?>
				<script>
					alert("ada yang kosong");
					window.location.href = "../index.php?page=sign_up";
				</script>
				<?php
			}else{
				$tgl_lahir= $thn."-".$bln."-".$tgl;
				$insert=mysql_query("insert into tb_user values (
				'$username',
				'$password',
				'$nama',
				'$tmp_lahir',
				'$tgl_lahir',
				'$jk',
				'$alamat',
				'$kota',
				'$level')");
				if($insert){
					?>
					<script>
						alert("berhasil");
						window.location.href = "../index.php";
					</script>
					<?php
				}else{
					?>
					<script>
						alert("gagal");						
						window.location.href = "../index.php?page=sign_up";
					</script>
					<?php
				}
			}
	}

?>