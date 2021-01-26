<?php
	error_reporting(0);
	include "koneksi.php";
	
	$username = $_POST['txt_user'];
	$password = md5($_POST['txt_pass']);
	
	$select = mysql_query("SELECT * FROM tb_user WHERE USERNAME = '$username' && PASSWORD ='$password'");
    $jumlah = mysql_num_rows($select);
	$data=mysql_fetch_array($select);
	
	if ($jumlah==1){
		session_start();

		$_SESSION ['username'] = $data ['USERNAME'] ;
		$_SESSION ['level'] = $data ['LEVEL'] ;
		
		if($data ['LEVEL']=="karyawan"){
			?>
			<script>
				alert("Login Succesfull as KARYAWAN");
				window.location.href="master/karyawan/index.php";
			</script>		
			<?php
		}else if($data ['LEVEL']=="member"){
			?>
			<script>
				alert("Login Succesfull as MEMBER");
				window.location.href="master/member/index.php";
			</script>		
			<?php
		}else if($data ['LEVEL']=="member"){
			?>
			<script>
				alert("Login Succesfull as Admin");
				window.location.href="master/admin/index.php";
			</script>		
			<?php
		}
	}else{
		?>
		<script>
			alert("Username atau Password Salah");
			window.location.href="index.php?page=log_in";
		</script>		
		<?php	

	}
?>