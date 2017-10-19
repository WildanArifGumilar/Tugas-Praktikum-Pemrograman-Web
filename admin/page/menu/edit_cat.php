<?php 
$id=$_GET[id];
$query=mysql_query("select * from kategori where id_kategori='$id'");
$data=mysql_fetch_array($query);
?>
<div class="contadmin">
	<h3 class="title">Edit Kategori</h3>
	<form class="cssform" action="hand.php?action=edit_kategori" method="post">
		<input type="text" name="kategori" placeholder="Kategori" value="<?= $data['nama_kategori'] ?>">
		<input type="hidden" name="id" value="<?= $data['id_kategori'] ?>">
		<input type="submit" value="Simpan">
	</form>
</div>