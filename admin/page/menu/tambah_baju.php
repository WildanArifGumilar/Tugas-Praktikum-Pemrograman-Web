<div class="contadmin">
	<h3 class="title">Tambah Baju</h3>
	<form class="cssform" action="hand.php?action=tambah_baju" method="post" enctype="multipart/form-data">
		<input required="required" type="text" name="nama" placeholder="Nama Baju">
		<input required="required" type="text" name="harga_pokok" placeholder="Harga Pokok">
		<input required="required" type="text" name="harga_jual" placeholder="Harga Jual">
		<input required="required" type="text" name="jumlah_stok" placeholder="Jumlah Stok">
		<br><label for="kategori" class="label">Kategori</label>
		<select required="required" name="kategori" class="select">
			<?php
			$root->tampil_kategori1();
			?>
		</select><br>
			<label for="gambar" class="label">Gambar</label>
		<div class="inputgambar">
			<input required="required" style="margin-top: 8px;margin-bottom: 7px !important;padding: 0px 10px;" type="file" name="foto">
		</div>
		<textarea required="required" name="keterangan" class="keterangan" placeholder="keterangan"></textarea><br><br>
		<input type="submit" value="Simpan">
	</form>
</div>