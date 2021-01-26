<?php
	include "../koneksi.php";
	$module=$_GET["module"];
	$act=$_GET["act"];
//	$id=$_GET["id"];
	
	if($module=="karyawan" and $act=="edit"){
		$id=$_POST["id"];
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
			?>
			<script>
			alert("Masi Ada Yang Kosong");
			window.location.href = "index.php?module=profil";
			</script>
			<?php
		}else{
			$edit=mysql_query("update tb_user set
			PASSWORD='$password',
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
				window.location.href = "index.php?module=profil&act=edit";
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
			window.location.href = "index.php?module=data_member";
			</script>
			<?php
		}
	}
	
	else if ($module=="info" && $act=="insert"){
		
	}
	else if ($module=="info" && $act=="edit"){
				
	}
	else if ($module=="info" && $act=="delete"){
			
	}
?>