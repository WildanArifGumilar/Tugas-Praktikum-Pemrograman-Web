<div class="contadmin">
	<table class="tb_kat">
		<tr>
			<th>Nama</th><th>Tanggal</th><th>Status</th><th>Aksi</th>
		</tr>	
		<?php 
			$transaksi=$root->tampil_transaksi();
			foreach ($transaksi as $r) {
				?>
				<tr>
					<td><?= $r['nama'] ?></td>
					<td><?= $r['tanggal'] ?></td>
					<td><?= $r['status'] ?> </td>
					<td width="250px">
					<?php
					if ($r["status"]=="Menunggu Persetujuan") {
						
					 ?>
					<a href="hand.php?action=konfirmasiadmin&id_transaksi=<?= $r["id_transaksi"] ?>" class="btn">Setujui</a> 
					<?php 
					}else{

						if ($r["status"]=="Dalam Pengiriman") {
						}
						else{

							?>
							<a href="hand.php?action=konfirmasiadminkirim&id_transaksi=<?= $r["id_transaksi"] ?>" class="btn">Kirim</a> 
							<?php
						}
					} ?>
					<a href="home.php?page=detail_transaksi&id=<?= $r["id_subtransaksi"] ?>&tanggal=<?= $r['tanggal'] ?>&status=<?= $r['status'] ?>&id_transaksi=<?= $r['id_transaksi'] ?>" class="btn">Detail</a>
					<a href="hand.php?action=hapus_transaksii&id=<?= $r["id_transaksi"] ?>" class="btn red">Hapus</a></td>
				</tr>
				<?php
			}
		?>
	</table>
</div>