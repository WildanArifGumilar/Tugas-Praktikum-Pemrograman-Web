<?php include "page/head.php"; ?>
<div class="container inside">
	<div class="detail">

	<h3 class="keeranjang"><i class="fa fa-shopping-cart"></i> Detail Transaksi tanggal : <?= $_GET["tanggal"] ?></h3>
	<div style="padding:10px 60px;color:#666;font-size:14px;">
		Status : <?= $_GET["status"] ?><br><br>
		<?php  $total=mysql_query("select sum(total_harga) as jumlah from subtransaksi where encrypt='$_GET[id]'");
		$hasill=mysql_fetch_array($total);
		?>
		Total Harga : <?= "Rp ".number_format($hasill["jumlah"],0,',','.'); ?><br><br>
		Bukti Pembayaran :<br><br>
		<?php $gambar_konfirmasi=mysql_query("select * from konfirmasi where id_transaksi='$_GET[id_transaksi]'");
		$gambar_k=mysql_fetch_array($gambar_konfirmasi);
		$cek_gambar=mysql_num_rows($gambar_konfirmasi);
		if ($cek_gambar<=0) {
			echo "<b>Anda belum mengunggah bukti pembayaran</b>";
		}else{
		echo "<a href='$gambar_k[gambar]' target='_blank'><img src='$gambar_k[gambar]' width='200px'></a>";
		 
		 }
		 ?>
	</div>
	<table class="tkeranjang">
	<tr>
		<th>Nama Baju</th><th>Harga Baju</th><th>Jumlah Beli</th><th>Total Harga</th>
	</tr>

	<?php $data=$root->detail_transaksi($_GET["id"]);
	foreach ($data as $r) {
		?>
		<tr>
			<td><?= $r["nama_baju"] ?></td>
			<td><?= "Rp ".number_format($r["harga_jual"],0,',','.') ?></td>
			<td><?= $r["jumlah"] ?></td>
			<td><?= "Rp ".number_format($r["total_harga"],0,',','.') ?></td>
		</tr>
		<?php
	}
	 ?>

		
	</table>
<a href="transaksi.php" class="btn-buy" style="margin:20px 60px;display:inline-block">Kembali</a>
	</div>
</div>