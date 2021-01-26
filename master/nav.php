<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$id=$_SESSION ['username'];
	$select_user=mysql_query("select * from tb_user where USERNAME='$id'");
	$data_user=mysql_fetch_array($select_user);
?>
<ul>
	<li>Selamat Datang <?php echo $data_user['NAMA'];?></li>
	<li><a href="../logout.php">Log Out</a></li>
</ul>