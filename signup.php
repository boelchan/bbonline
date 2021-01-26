<h1>SIGN UP</h1>
<hr size="5" color="#eee">
<form method="POST" action="master/aksi.php?module=signup">
	<table>
		<tr>
			<td>Username</td>
			<td><input type="text" name="txt_user"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input type="password" name="txt_pass"></td>
		</tr>
		<tr>
			<td>Nama Lengkap</td>
			<td><input type="text" name="txt_nama"></td>
		</tr>
		<tr>
			<td>Tempat Lahir</td>
			<td><input type="text" name="txt_tmp_lahir"></td>
		</tr>
		<tr>
			<td>Tanggal Lahir</td>
			<!-- <td><input type="date" name="txt_tgl_lahir"></td> -->
			<td>
				<select class="zzz" name="tgl">
					<?php for ($i=1; $i < 32; $i++) { ?> 
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php } ?>				
				</select>-
				<select name="bln" class="zzz">
					<?php for ($i=1; $i < 13; $i++) { ?> 
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php } ?>				
				</select>-
				<select name="thn" class="zzzz">
					<?php for ($i=1900; $i < 2016; $i++) { ?> 
						<option value="<?php echo $i ?>"><?php echo $i ?></option>
					<?php } ?>				
				</select>
			</td>
		</tr>
		<tr>
			<td>Jenis Kelamin</td>
			<td><select name="txt_jk" />
					<option value="">-Pilih-</option>
					<option value="1">Laki-Laki</option>
					<option value="2">Perempuan</option>
				</select></td>
		</tr>
		<tr>
			<td>Alamat</td>
			<td><input type="textarea" name="txt_alamat"></td>
		</tr>
		<tr>
			<td>Kota</td>
			<td><input type="text" name="txt_kota"></td>
		</tr>
		<tr>
			<td colspan="2"><input class="tombolReset" type="submit" value="Daftar">  <input class="tombolBatal" type="reset" value="Reset"></td>
		</tr>
	</table>
</form>