<div class="contadmin">
	<a href="?page=tambah_kategori" class="tkategori"><i class="fa fa-plus"></i> Tambah Kategori</a>
	<table class="tb_kat">
	<tr>
		<th>No</th><th>Nama Kategori</th><th>Aksi</th>
	</tr>
		<?php $kategori=$root->tampil_kategori(); 
		$no=1;
		foreach($kategori as $r){ 
			echo "<tr>
				<td>$no</td><td>$r[nama_kategori]</td>
				<td>
					<a href='home.php?page=edit_cat&id=$r[id_kategori]' class='btn'>Edit</a>
					<a href='hand.php?action=hapus_cat&id=$r[id_kategori]' class='btn red'>Hapus</a>
				</td>
			</tr>";
			$no++;
		}
		?>
		

	</table>
</div>