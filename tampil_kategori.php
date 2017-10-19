<?php include "page/head.php"; ?>
<div class="container inside">
	<div class="seltang">
		<h4>SELAMAT DATANG DI KARDI ONLINE SHOP</h4>
		<span><?php echo date("d-m-Y"); ?></span>
	</div>

	<div class="content2">

		<div class="post2">

			<h3 class="title-top" style="margin-right:23px;margin-top:10px;">Menampilkan kategori = <?= $_GET["nama"] ?></h3>
					<?php $baju=$root->tampil_baju_kategori($_GET['id']); 
					foreach($baju as $r){ 
		
		 ?>
			<div class="inpost">
				<img src="admin/<?= $r["gambar"] ?>">
				<div class="padding">
					<h4><?= $r["nama_baju"] ?></h3>
					<span>Rp. <?= number_format($r['harga_jual'],0,',','.') ?></span><br>
					<a href="detail.php?id=<?php echo $r['id_baju'] ?>" class="btn-buy">Detail</a>
				</div>
			</div>	
			<?php } ?>
		</div>
		<div class="sidebar">
			<div class="innersidebar">
				<h3>Paling Banyak Dibeli</h3>
				<div class="banyakdiibeli">
				<?php $baju2=$root->tampil_baju_paling_banyak(); 
					foreach($baju2 as $r){ 
		
		 ?>
					<li class="pb">
						<img src="admin/<?= $r["gambar"] ?>">
							<h4><?= $r["nama_baju"] ?></h3>
							<span>Rp. <?= number_format($r['harga_jual'],0,',','.') ?></span><br>
							<a href="detail.php?id=<?php echo $r['id_baju'] ?>" class="btn-buy">Detail</a>
						
						<div class="both"></div>
					</li>

			<?php } ?>
				</div>
			</div>
		</div>
		<div class="both"></div>
	</div>

</div>

<?php include "footer.php" ?>