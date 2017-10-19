<?php include "page/head.php";
?>

<div class="container inside">
	<div class="detail">
	<?php $detail=$root->detail_baju($_GET["id"]);
	$ids=$_GET["id"];
mysql_query("update baju set populer= populer + 1 where id_baju='$ids'");
	?>
		<div class="posted">
			<img src="admin/<?php echo $detail['gambar'] ?>">
			<h3><?= $detail["nama_baju"] ?></h3>
			<span><i class="fa fa-tag"></i> Label : <?= $detail["nama_kategori"] ?></span>
			<span><i class="fa fa-money"></i> Harga : <?= "Rp. ".number_format($detail['harga_jual'],0,',','.') ?></span>
			<span><i class="fa fa-plus"></i> Stok : <?= $detail["stok"] ?></span>
			<p><b>Keterangan : </b><?= $detail["keterangan"] ?></p><br />
					<?php 
		if (isset($_SESSION['username'])) {
			?>
			<form action="hand.php?action=tambah_keranjang" method="post">
				<input type="number" name="jumlah" min="1" value="1" max="<?= $detail['stok'] ?>" style="width:100px">
				<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
				<input type="hidden" name="id_customer" value="<?= $_SESSION['id'] ?>">
				<input type="submit" value="tambah ke keranjang">
			</form>
							<?php
		}else{
		 ?>
			<a style="cursor:pointer" id="btn-loginn"><i class="fa fa-sign-in"></i> Login</a>
<?php } ?>
			
			<div class="both"></div>
		</div>
	</div>
	<div class="social-share">
		<div class="facebook">
			<a id="button" onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $title; ?>&amp;p[summary]=<?php echo $summary;?>&amp;p[url]=<?php echo $url; ?>&amp;&p[images][0]=<?php echo $image;?>', 'sharer', 'toolbar=0,status=0,width=550,height=400');" target="_parent" href="javascript: void(0)">
			<img src="images/f.jpg" /></a>  
		</div>
		<div class="twitter">
			<a class="twitter popup" href="http://twitter.com/share?source=sharethiscom&text=<?php echo $title;?>&url=<?php echo $url; ?>&via=berbagiyuks"><img src="images/tw.jpg" /></a>
		</div>
		<div class="google">
			<a href="javascript:void(0);" onclick="popUp=window.open('https://plus.google.com/share?url=<?php echo $url; ?> ','popupwindow','scrollbars=yes,width=800,height=400');popUp.focus();return false"><img src="images/g.jpg" /></a>
		</div>
		<div class="linkedin">
			<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?> &title=<?php echo $title;?>&summary=<?php echo $summary;?>&source=BerbagiYuks.con" class="popup"rel="nofollow"><img src="images/in.jpg" /></a>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btn-loginn").click(function(){
			$("#loginbox").toggle();
		});
	});
</script>
<style>
.facebook,.twitter { margin-left:3px !important;}
.facebook, .twitter, .google, .linkedin, .pinterest {
	float:left;
	position:relative;
	margin-left:5px;
}
.container {
	width:1000px;
	margin:auto;
	text-align:center;
}
.social-share {
	width:190px;
	margin:15px auto 0;
}
</style>