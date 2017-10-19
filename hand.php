<?php 
include 'root.php';
$act=$_GET['action'];
if ($act=="login") {
	$root->login($_POST["username"],$_POST["password"]);
}
if ($act=="logout") {
	session_start();
	session_destroy();
	header("location:index.php");
}
if ($act=="tambah_keranjang") {
	$root->tambah_keranjang($_POST["jumlah"],$_POST["id"],$_POST["id_customer"]);
}
if ($act=="hapus_keranjang") {
	$root->hapus_keranjang($_GET["id"]);
}
if ($act=="selesai_keranjang") {
		$key=rand();
	$root->selesai_keranjang($_GET["id"],$key);
}
if ($act=="konfirmasi") {
	$root->konfirmasi($_POST["id_transaksi"],$_FILES['foto']['name'],$_FILES['foto']['tmp_name'],$_FILES['foto']['type']);
}
if ($act=="hapus_transaksii") {
	$root->hapus_transaksii($_GET["id"]);
}
if ($act=="daftar") {
	mysql_query("insert into customer set username='$_POST[username]',password='$_POST[password]',nama='$_POST[nama]',alamat='$_POST[alamat]',telfon='$_POST[telfon]'");
	header("location:index.php");
}
if ($act=="sudahterima") {
	mysql_query("update transaksi set status='Sudah Diterima Konsumen' where id_transaksi='$_GET[id_transaksi]'");
	header("location:transaksi.php");
}
?>