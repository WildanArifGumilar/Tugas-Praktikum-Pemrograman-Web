<?php
error_reporting(0);
class user
{
	
	function __construct()
	{
		$a=mysql_connect("localhost","root","");
		$b=mysql_select_db("db_shop");
		if (!$a||!$b) {
			echo "error, reason : ".mysql_error();
		}
	}
	function show_categori(){
		$query=mysql_query("select * from kategori");
		while ($r=mysql_fetch_array($query)) {
			echo "<li><a href='tampil_kategori.php?id=$r[id_kategori]&nama=$r[nama_kategori]'>$r[nama_kategori]</a></li>";
		}
	}
	function tampil_baju(){
		$query=mysql_query("select * from baju");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_baju_kategori($id){
		$query=mysql_query("select * from baju where kategori='$id'");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_baju_pencarian($nama){
		$query=mysql_query("select * from baju where nama_baju LIKE '%$nama%'");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_baju_populer(){
		$query=mysql_query("select * from baju order by populer DESC limit 6");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_baju_paling_banyak(){
		$query=mysql_query("select * from baju order by paling_banyak DESC limit 6");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function detail_baju($id){
		$query=mysql_query("select baju.id_baju,baju.nama_baju,baju.gambar,baju.harga_pokok,baju.harga_jual,baju.keterangan,baju.stok,kategori.nama_kategori FROM baju INNER JOIN kategori ON baju.kategori=kategori.id_kategori where baju.id_baju='$id'");
		return mysql_fetch_array($query);
	}
	function login($username,$password){
		$query=mysql_query("select * from customer where username='$username' and password='$password'");
		$check=mysql_num_rows($query);
		if ($check > 0) {
			$data=mysql_fetch_array($query);
			session_start();
			$_SESSION['nama']=$data["nama"];
			$_SESSION['id']=$data["id_customer"];
			$_SESSION['username']=$data["username"];
			header("location:index.php");
			
		}else{
			header("location:index.php");
		}
	}
	function keranjang($id){
		$query=mysql_query("select sum(jumlah) as jumlah from keranjang where id_customer='$id'");
		$a=mysql_fetch_array($query);
		if ($a["jumlah"]=='') {
			echo "0";
		}else{
		echo $a["jumlah"];
		}
	}
	function tambah_keranjang($jumlah,$id_baju,$id_customer){
		$q=mysql_query("select * from baju where id_baju='$id_baju'");
		$arrq=mysql_fetch_array($q);
		$harga_jual=$arrq["harga_jual"];
		$total_harga=$harga_jual*$jumlah;
		$date=date("d-m-Y");
		$data=mysql_query("insert into keranjang set jumlah='$jumlah',tanggal='$date',id_customer='$id_customer',total_harga='$total_harga',id_baju='$id_baju'");
		$stok=$arrq["stok"];
		$hstok=$stok-$jumlah;
		mysql_query("update baju set stok='$hstok',paling_banyak= paling_banyak + 1 where id_baju='$id_baju'");
		if ($data) {
			header("location:keranjang.php");
		}else{
			echo mysql_error();
		}
	}
	function tampil_keranjang($id){
		$query=mysql_query("select baju.nama_baju,baju.harga_jual,keranjang.jumlah,keranjang.total_harga,keranjang.id_keranjang from keranjang INNER join baju on baju.id_baju=keranjang.id_baju where keranjang.id_customer='$id'");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function total_harga($id){
		$query=mysql_query("SELECT SUM( total_harga ) AS total_harga FROM keranjang where id_customer='$id'");
		$return=mysql_fetch_array($query);
		echo "Rp ".number_format($return["total_harga"],0,',','.');
	}
	function hapus_keranjang($id){
		$q=mysql_query("select baju.stok,keranjang.jumlah from keranjang INNER JOIN baju on baju.id_baju=keranjang.id_baju where keranjang.id_keranjang='$id'");
		$ar=mysql_fetch_array($q);
		$restok=$ar['stok']+$ar['jumlah'];
		$qq=mysql_query("update baju set stok='$restok'");
		$query=mysql_query("delete from keranjang where id_keranjang='$id'");

			header("location:keranjang.php");

	}
	function selesai_keranjang($id,$key){
		$now=date("d-m-Y");
		$insert=mysql_query("insert into transaksi set status='Belum dikonfirmasi',tanggal='$now',id_customer='$id',id_subtransaksi='$key'");
		$query=mysql_query("select baju.id_baju,baju.nama_baju,baju.harga_jual,keranjang.jumlah,keranjang.total_harga,keranjang.id_keranjang from keranjang INNER join baju on baju.id_baju=keranjang.id_baju where keranjang.id_customer='$id'");
		while ($r=mysql_fetch_array($query)) {
			$d=mysql_query("insert into subtransaksi set jumlah='$r[jumlah]',tanggal='$now',id_customer='$id',id_baju='$r[id_baju]',total_harga='$r[total_harga]',encrypt='$key'");
		}
		$delete=mysql_query("delete from keranjang where id_customer='$id'");
		header("location:transaksi.php");
	}
	function tampil_transaksi($id){
		$query=mysql_query("select * from transaksi where transaksi.id_customer='$id'");
				while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function konfirmasi($id_transaksi,$nama_foto,$tmp_foto,$type_foto){
				if ($type_foto!="image/jpeg"&&$type_foto!="image/jpg"&&$type_foto!="image/png"&&$type_foto!="image/gif") {
					?>
		            <script type="text/javascript">
		            alert("Gunakan file yang benar");
		            window.location.href="transaksi.php";
		            </script>
		            <?php
		}else{
		$destination="konfirmasi/$nama_foto";
		move_uploaded_file($tmp_foto, $destination);
		$query=mysql_query("insert into konfirmasi set id_transaksi='$id_transaksi',gambar='$destination'");
		mysql_query("update transaksi set status='Menunggu Persetujuan' where id_transaksi='$id_transaksi'");
		header("location:transaksi.php");

		}

	}
	function detail_transaksi($id){
		$query=mysql_query("select baju.nama_baju,baju.harga_jual,subtransaksi.jumlah,subtransaksi.total_harga from subtransaksi inner join baju on baju.id_baju=subtransaksi.id_baju where encrypt='$id'");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function hapus_transaksii($id){
		mysql_query("delete from transaksi where id_subtransaksi='$id'");
		mysql_query("delete from subtransaksi where encrypt='$id'");
		header("location:index.php");
	}
}
$root=new user();
?>