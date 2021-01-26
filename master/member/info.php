<?php
	error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
	session_start();
	$idm=$_SESSION ['username'];
	$id=$_GET['id'];
	$module =$_GET["module"];
	$act =$_GET["act"];
	switch($act){
		default:
		$select=mysql_query("select * from tb_info order by ID_INFO desc");
		
		?>
		<link type="text/css" rel="stylesheet" href="css/style.css"> 
			<table>
				<?php
				while ($data=mysql_fetch_array($select)){
				?>
				<tr>
					<td><h3><?php echo $data['JUDUL']?></h3></td>
				</tr>
				<tr>
					<td><?php echo $data['ISI']?></td>
				</tr>
				<tr>
					<td><hr color="#eee"><br></td>
				</tr>
				<?php
				}
				?>
			</table>
			<?php
		break;
		
	}
?>