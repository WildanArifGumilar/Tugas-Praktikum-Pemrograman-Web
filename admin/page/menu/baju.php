  <div class="contadmin">
	<a href="?page=tambah_baju" class="tkategori"><i class="fa fa-plus"></i> Tambah Baju</a>
	<table class="tb_kat" width="100%">
	<tr>
		<th>No</th><th>Nama Pakaian</th><th>Gambar</th><th>Harga Pokok</th><th>Harga Jual</th>
		<th>Stok</th><th>Kategori</th><th width="100px">Aksi</th>
	</tr>
		<?php $kategori=$root->tampil_baju(); 
		$no=1;
		foreach($kategori as $r){ 
			echo "<tr>
				<td>$no</td>
				<td>$r[nama_baju]</td>
				<td><img src='$r[gambar]' width='100px' /></td>
				<td>Rp. ".@number_format($r['harga_pokok'],0,',','.')."</td>
				<td>Rp. ".@number_format($r['harga_jual'],0,',','.')."</td>
				<td>$r[stok]</td>
				<td>$r[nama_kategori]</td>
				<td>
					<a href='home.php?page=edit_baju&id=$r[id_baju]' class='btn'>Edit</a>
					<a href='hand.php?action=hapus&id=$r[id_baju]' class='btn red'>Hapus</a>
				</td>

			</tr>";
			$no++;
		}
		?>
		

	</table>
</div>