<?php include "page/head.php"; ?>
<div class="container inside">
	<div class="detail">
	<h3 class="keeranjang"><i class="fa fa-shopping-cart"></i> Konfirmasi Pembayaran Anda</h3>
		<form action="hand.php?action=konfirmasi" style="padding:20px 60px;" enctype="multipart/form-data" method="post"> 
			Masukkan Bukti Pembayaran : <input type="file" name="foto">
			<input type="hidden" name="id_transaksi" value="<?= $_GET['id_transaksi'] ?>">
			<input type="submit" value="Proses" style="display:block;margin:10px 0px;padding:5px">
		</form>
	</div>
</div>