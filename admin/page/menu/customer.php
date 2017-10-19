<div class="contadmin">
	<table class="tb_kat">
	<tr>
		<th>No</th><th>Nama</th><th>Username</th><th>Password</th><th>Telfon</th><th>Alamat</th>
	</tr>
		<?php $kategori=$root->tampil_customer(); 
		$no=1;
		foreach($kategori as $r){ 
			echo "<tr>
				<td>$no</td><td>$r[nama]</td><td>$r[username]</td><td>$r[password]</td><td>$r[telfon]</td><td>$r[alamat]</td>
			</tr>";
			$no++;
		}
		?>
		

	</table>
</div>