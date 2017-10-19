<?php 
include "root.php";
$act=$_GET["action"];
if (isset($act)) {
	if ($act=="login_admin") {
		$root->login($_POST['username'],$_POST['password']);
	}
	if ($act=="tambah_kategori") {
		$root->tambah_kategori($_POST['kategori']);
	}
	if ($act=="edit_kategori") {
		$root->edit_kategori($_POST['kategori'],$_POST['id']);
	}
	if ($act=="tambah_baju") {
		$root->tambah_baju($_POST['nama'],$_POST['harga_pokok'],$_POST['harga_jual'],$_POST['kategori'],
			$_POST['keterangan'],$_FILES['foto']['name'],$_FILES['foto']['tmp_name'],$_FILES['foto']['type'],$_POST['jumlah_stok']);
	}
	if ($act=="edit_baju"){
		$root->edit_baju($_POST['nama'],$_POST['harga_pokok'],$_POST['harga_jual'],$_POST['kategori'],
			$_POST['keterangan'],$_FILES['foto']['name'],$_FILES['foto']['tmp_name'],$_FILES['foto']['type'],$_POST['jumlah_stok'],$_POST['id_baju']);
	}
	if ($act=="hapus") {
		$query=mysql_query("delete from baju where id_baju='$_GET[id]'");
			if ($query) {
			?>
			<script>
				alert("Pakaian Berhasil Dihapus");
				window.location.href="home.php?page=baju";
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Pakaian Gagal Dihapus");
				window.location.href="home.php?page=baju";
			</script>
			<?php
		}
	}

	if ($act=="hapus_cat") {
		$query=mysql_query("delete from kategori where id_kategori='$_GET[id]'");
			if ($query) {
			?>
			<script>
				alert("Kategori Berhasil Dihapus");
				window.location.href="home.php?page=kategori";
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Kategori gagal Dihapus");
				window.location.href="home.php?page=kategori";
			</script>
			<?php
		}
	}
	if ($act=="konfirmasiadmin") {
		$q=mysql_query("update transaksi set status='Sudah Dikonfirmasi' where id_transaksi='$_GET[id_transaksi]'");
		header("location:home.php?page=transaksi");
	}
	if ($act=="konfirmasiadminkirim") {
		$q=mysql_query("update transaksi set status='Dalam Pengiriman' where id_transaksi='$_GET[id_transaksi]'");
		header("location:home.php?page=transaksi");
	}
	if ($act=="logout") {
		session_start();
		session_destroy();
		header("location:index.php");
	}
	
}
if ($act=="hapus_transaksii") {
	$query=mysql_query("delete from transaksi where id_transaksi='$_GET[id]'");
			if ($query) {
			?>
			<script>
				alert("Transaksi Berhasil Dihapus");
				window.location.href="home.php?page=transaksi";
			</script>
			<?php
		}
		else{
			?>
			<script>
				alert("Transaksi gagal dihapus");
				window.location.href="home.php?page=transaksi";
			</script>
			<?php
		}
	}