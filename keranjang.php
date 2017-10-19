<?php include "page/head.php"; ?>
<div class="container inside">
	<div class="detail">
	<h3 class="keeranjang"><i class="fa fa-shopping-cart"></i> Keranjang</h3>
	<table class="tkeranjang">
		<tr>
			<th>Nama Baju</th><th>Harga</th><th>Jumlah Beli</th><th>Total Harga</th><th>Aksi</th>
		</tr>	
		<?php 
			$Keranjang=$root->tampil_keranjang($_SESSION["id"]);
			foreach ($Keranjang as $r) {
				?>
				<tr>
					<td><?= $r['nama_baju'] ?></td>
					<td><?= "Rp ".number_format($r['harga_jual'],0,',','.') ?></td>
					<td><?= $r['jumlah'] ?></td>
					<td><?= "Rp ".number_format($r['total_harga'],0,',','.') ?></td>
					<td><a href="hand.php?action=hapus_keranjang&id=<?= $r["id_keranjang"] ?>" class="btn-buy">Hapus</a></td>
				</tr>
				<?php
			}
		?>
		<tr>
			<td colspan="3"></td>
			<td><?php $root->total_harga($_SESSION["id"]) ?></td>
			<td><a href="hand.php?action=selesai_keranjang&id=<?= $_SESSION['id'] ?>" class="btn-buy" style="background:#3498db">Selesai</a></td>
		</tr>
	</table>
	<br>
	</div>
	
</div>