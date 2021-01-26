<?php
	include "../koneksi.php";
	$module=$_GET["module"];
	$act=$_GET["act"];
	session_start();
	
	if($module=="transaksi" and $act=="insert"){
		//status:
		//0 jika belum isi detail
		//1 jika sudah verifikasi
		$user=$_SESSION["username"];
		$select=mysql_query("select * from tb_transaksi where USERNAME='$user' && STATUS='0'");
		$fselect=mysql_fetch_array($select);
		$jml=mysql_num_rows($select);
		if($jml>0){
			?>
				<script>
				alert("Selesaikan dahulu transaksi anda sebelumnya.");
				window.location.href = "index.php?module=detail&act=view&id=<?php echo $fselect['ID_T'];?>";
				</script>
			<?php
		}else{
			$date=date("Y-m-d H:i:s");
			$query=mysql_query("insert into tb_transaksi values ('','$user','$date',0,0,'','','','','Belum Dikirim')");
			$select_transaksi=mysql_query("select * from tb_transaksi where USERNAME='$user' && TGL_T='$date'");
			$data_tran=mysql_fetch_array($select_transaksi);
			$id=$data_tran["ID_T"];
			if($query){
				?>
				<script>
				alert("Silahkan lakukan rincian, produk apa yang akan Anda Beli.");
				window.location.href = "index.php?module=detail&act=view&id=<?php echo $id;?>";
				</script>
				<?php
			}		
		}
	}elseif ($module=="detail" and $act=="insert"){
		$id_t=$_POST["id"];
		$id_p=$_POST["produk"];
		$select_produk=mysql_query("select * from tb_produk where ID_P='$id_p'");
		$data_produk=mysql_fetch_array($select_produk);
		$harga=$data_produk["HARGA_P"];
		$jumlah=$_POST["jumlah"];
		$total=$jumlah*$harga;
		$query=mysql_query("insert into tb_detail values ('','$id_t','$id_p','$jumlah','$total')");
		if($query){
 			$total_trans=0;
			$query2=mysql_query("select * from tb_detail where ID_T='$id_t'");
			while($data2=mysql_fetch_array($query2)){
				$total_trans=$total_trans+$data2["TOTAL_D"];
			}
			$update=mysql_query("update tb_transaksi set TOTAL_T='$total_trans' where ID_T='$id_t'");
			?>
			<script>
			window.location.href = "index.php?module=detail&act=view&id=<?php echo $id_t;?>";
			</script>
			<?php
		}else{
			?>
			<script>
			window.location.href = "index.php?module=detail&act=view&id=<?php echo $id_t;?>";
			</script>
			<?php
		}
	}elseif ($module=="detail" and $act=="verifikasi"){
		$id_t=$_GET["id"];
		$lokasi=$_POST['lokasi'];
		$norek=$_POST['norek'];
		$an=$_POST['an'];
		$idm=$_SESSION ['username'];
		$query=mysql_query("UPDATE tb_transaksi SET 
			`lokasi` = '$lokasi',
			`norek` = '$norek', 
			`an` = '$an',
			STATUS=1 where ID_T='$id_t'");
			?>
			<script>
			alert("telah diverifikasi");
			window.location.href = "index.php?module=detail&id=<?php echo $id_t;?>";
			</script>
			<?php
	}elseif ($module=="detail" and $act=="hapusdetail") {
		$idd=$_GET["idd"];
		$id=$_GET["id"];
		$del=mysql_query("DELETE FROM tb_detail WHERE `tb_detail`.`ID_D` = $idd");
		if ($del) {
			?>
			<script>
			window.location.href = "index.php?module=detail&id=<?php echo $id;?>";
			</script>
			<?php	
		}
	}
?>