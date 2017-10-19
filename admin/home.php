<?php
session_start();
if (!$_SESSION["id_admin"]) {

	header("location:index.php");
}

?>
<style type="text/css">
	body{background: #fff !important;}
</style>
<?php 
include "page/head.php";
include "page/sidebar.php";
include "root.php";
?>
<div class="block">
<?php include "page/nav.php" ?>

<?php 
if (isset($_GET['page'])) {
	if ($_GET['page']=='kategori') {
		include "page/menu/kategori.php";
	}
	if ($_GET['page']=='tambah_kategori') {
		include "page/menu/tambah_kategori.php";
	}
	if ($_GET['page']=='baju') {
		include "page/menu/baju.php";
	}
	if ($_GET['page']=='tambah_baju') {
		include "page/menu/tambah_baju.php";
	}
	if ($_GET['page']=='edit_cat') {
		include "page/menu/edit_cat.php";
	}
	if ($_GET['page']=='transaksi') {
		include "page/menu/transaksi.php";
	}
	if ($_GET['page']=='customer') {
		include "page/menu/customer.php";
	}
	if ($_GET['page']=='edit_baju') {
		include "page/menu/edit_baju.php";
	}
	if ($_GET['page']=='detail_transaksi') {
		include "page/menu/detail_transaksi.php";
	}
}
else{
	include "page/menu/index.php";
}
?>

</div>
<div class="both"></div>