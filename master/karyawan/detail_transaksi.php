<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$idm=$_SESSION ['username'];
	$id=$_GET['id'];
	$module =$_GET["module"];
	$act =$_GET["act"];
	switch($act){
		default:
		$select=mysql_query("select * from tb_transaksi");
		
		?>
		<h1>MY TRANS</h1>
		<hr size="5" color="white">
		<a href="aksi.php?module=transaksi&act=insert">TAMBAH TRANSAKSI</a></td>
			<table>
				<tr>
					<td>NO</td>
					<td>ID TRANSAKSI</td>
					<td>USERNAME</td>
					<td>TANGGAL TRANSAKSI</td>
					<td>TOTAL TRANSAKSI</td>
					<td>STATUS</td>
					<td>OPTION</td>
				</tr>
				<?php
				$no=1;

				while ($data=mysql_fetch_array($select)){
				?>
				<tr>
					<td><?php echo $no?></td>
					<td><?php echo $data['ID_T']?></td>
					<td><?php echo $data['USERNAME']?></td>
					<td><?php echo $data['TGL_T']?></td>
					<td><?php echo $data['TOTAL_T']?></td>
					<td><?php echo $data['STATUS']?></td>
					<td><a href="?module=detail&id=<?php echo $data["ID_T"];?>">DETAIL</a></td>
				</tr>
				<?php
				$no++;
				}
				?>
			</table>
			<?php
		break;
		
		case 'detail';
		$select=mysql_query("select * from tb_detail");
		
		?>
		<h1>DETAIL</h1>
		<hr size="5" color="white">
		<a href="aksi.php?module=transaksi&act=insert">TAMBAH DETAIL</a></td>
			<table>
				<tr>
					<td>ID DETAIL</td>
					<td>ID TRANSAKSI</td>
					<td>ID PRODUK</td>
					<td>JUMLAH</td>
					<td>TOTAL DETAIL</td>
				</tr>
				<?php
				$no=1;

				while ($data=mysql_fetch_array($select)){
				?>
				<tr>
					<td><?php echo $no?></td>
					<td><?php echo $data['ID_D']?></td>
					<td><?php echo $data['ID_T']?></td>
					<td><?php echo $data['ID_P']?></td>
					<td><?php echo $data['JUMLAH']?></td>
					<td><?php echo $data['TOTAL_D']?></td>
					<td><a href="?module=&act=delete&id=<?php echo $data["ID_INFO"];?>" onclick=return confirm("yakin??")>DETAIL</a></td>
				</tr>
				<?php
				$no++;
				}
				?>
			</table>
			<?php
		break;
	}
?>