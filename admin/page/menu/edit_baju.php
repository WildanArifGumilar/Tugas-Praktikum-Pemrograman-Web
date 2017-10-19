<?php 
$data=mysql_query("select * from baju where id_baju='$_GET[id]'");
$hasil=mysql_fetch_array($data);
 ?>
<div class="contadmin">
	<h3 class="title">Edit Baju</h3>
	<form class="cssform" action="hand.php?action=edit_baju" method="post" enctype="multipart/form-data">
		<input required="required" type="text" name="nama" placeholder="Nama Baju" value="<?= $hasil['nama_baju'] ?>">
		<input required="required" type="text" name="harga_pokok" placeholder="Harga Pokok" value="<?= $hasil['harga_pokok'] ?>">
		<input required="required" type="text" name="harga_jual" placeholder="Harga Jual" value="<?= $hasil['harga_jual'] ?>">
		<input required="required" type="text" name="jumlah_stok" placeholder="Jumlah Stok" value="<?= $hasil['stok'] ?>">
		<br><label for="kategori" class="label">Kategori</label>
		<select required="required" name="kategori" class="select">
			<?php
			$root->tampil_kategori2($hasil["kategori"]);
			?>
		</select><br>
			<label for="gambar" class="label">Gambar</label>
		<div class="inputgambar">
			<input required="required" style="margin-top: 8px;margin-bottom: 7px !important;padding: 0px 10px;" type="file" name="foto">
		</div>
		<textarea required="required" name="keterangan" class="keterangan" placeholder="keterangan"><?= $hasil['keterangan'] ?></textarea><br><br>
		<input type="hidden" name="id_baju" value="<?=$hasil['id_baju']?>">
		<input type="submit" value="Simpan">
	</form>
</div>