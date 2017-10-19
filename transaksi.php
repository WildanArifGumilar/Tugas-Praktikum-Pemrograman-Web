<?php include "page/head.php"; ?>
<div class="container inside">
	<div class="detail">
	<h3 class="keeranjang"><i class="fa fa-shopping-cart"></i> Transaksi</h3>
	<table class="tkeranjang">
		<tr>
			<th>Tanggal</th><th>Status</th><th>Aksi</th>
		</tr>	
		<?php 
			$transaksi=$root->tampil_transaksi($_SESSION["id"]);
			foreach ($transaksi as $r) {
				?>
				<tr>
					<td><?= $r['tanggal'] ?></td>
					<td><?= $r['status'] ?> </td>
					<td width="300px">
					<?php
					if ($r["status"]=="Menunggu Persetujuan" || $r["status"]=="Sudah Dikonfirmasi") {
						
					}else if($r["status"]=="Dalam Pengiriman"){
						?>
						<a href="hand.php?action=sudahterima&id_transaksi=<?= $r["id_transaksi"] ?>" class="btn-buy">Sudah Diterima</a>
						<?php
					}else if($r["status"]=="Sudah Diterima Konsumen"){
						
					}

					else{
					 ?>
					<a href="konfirmasi.php?id=<?= $_SESSION["id"] ?>&id_transaksi=<?= $r["id_transaksi"] ?>" class="btn-buy">Konfirmasi</a> 
					<?php } ?>
					<a href="detail_transaksi.php?id=<?= $r["id_subtransaksi"] ?>&tanggal=<?= $r['tanggal'] ?>&status=<?= $r['status'] ?>&id_transaksi=<?= $r['id_transaksi'] ?>" class="btn-buy">Detail</a> 
					<a href="hand.php?action=hapus_transaksii&id=<?= $r["id_subtransaksi"] ?>" class="btn-buy">Hapus</a></td>
				</tr>
				<?php
			}
		?>
	</table>
	<br>
		
	</div>
</div>