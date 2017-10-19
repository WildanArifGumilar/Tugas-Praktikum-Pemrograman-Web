<?php 
error_reporting(0);
class admin
{
	
	function __construct()
	{
		$a=mysql_connect("localhost","root","");
		$b=mysql_select_db("db_shop");
		if (!$a||!$b) {
			echo "error, reason : ".mysql_error();
		}
	}
	function login($username,$password){
		$check=mysql_query("select * from admin where username='$username' && password='$password'");
		$check1=mysql_num_rows($check);
		if ($check1==0) {
			?>
			<script>
				alert("login gagal, username atau password tidak benar");
			</script>
			<?php
		}
		else{
			$data=mysql_fetch_array($check);
			session_start();
			$_SESSION['id_admin']=$data['id_admin'];
			$_SESSION['username_admin']=$data['username'];
			$_SESSION['nama_admin']=$data['nama'];
			header("location:home.php");
		}
	}
	function tambah_kategori($kategori){
		$query=mysql_query("insert into kategori set nama_kategori='$kategori'");
		header("location:home.php?page=kategori");
	}
	function edit_kategori($kategori,$id){
		$query=mysql_query("update kategori set nama_kategori='$kategori' where id_kategori='$id'");
		header("location:home.php?page=kategori");
	}
	function tampil_kategori(){
		$query=mysql_query("select * from kategori");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_customer(){
		$query=mysql_query("select * from customer");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_baju(){
		$query=mysql_query("select baju.id_baju,baju.nama_baju,baju.gambar,baju.harga_pokok,baju.harga_jual,baju.keterangan,baju.stok,kategori.nama_kategori FROM baju INNER JOIN kategori ON baju.kategori=kategori.id_kategori order by baju.id_baju DESC");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}
	function tampil_kategori1(){
		$query=mysql_query("select * from kategori");
		while ($r=mysql_fetch_array($query)) {
			echo "<option value='$r[id_kategori]'>$r[nama_kategori]</option>";
		}
	}
	function tampil_kategori2($id_kategori){
		$query=mysql_query("select * from kategori");
		while ($r=mysql_fetch_array($query)) { ?>
			<option <?php if($r["id_kategori"]==$id_kategori){ echo "selected"; } ?> value="<?= $r["id_kategori"] ?>" ><?= $r["nama_kategori"]?></option>
		<?php }
	}
	function tambah_baju($nama,$harga_pokok,$harga_jual,$kategori,$keterangan,$nama_foto,$tmp_foto,$type_foto,$stok){
		
		if ($type_foto!="image/jpeg"&&$type_foto!="image/jpg"&&$type_foto!="image/png"&&$type_foto!="image/gif") {
					?>
		            <script type="text/javascript">
		            alert("Gunakan file yang benar");
		            window.location.href="home.php?page=tambah_baju";
		            </script>
		            <?php
		}else{
		$destination="gambar/$nama_foto";
		move_uploaded_file($tmp_foto, $destination);
		$query=mysql_query("insert into baju set nama_baju='$nama',harga_pokok='$harga_pokok',harga_jual='$harga_jual',kategori='$kategori',keterangan='$keterangan',stok='$stok',gambar='$destination'");
		    if ($query) { ?>
		            <script type="text/javascript">
		            alert("Pakaian Berhasil Ditambahkan");
		            window.location.href="home.php?page=baju";
		            </script>
		            <?php
            }else{
            		echo mysql_error();
            }   
		}
	}
	function edit_baju($nama,$harga_pokok,$harga_jual,$kategori,$keterangan,$nama_foto,$tmp_foto,$type_foto,$stok,$id_baju){
		
		if ($type_foto!="image/jpeg"&&$type_foto!="image/jpg"&&$type_foto!="image/png"&&$type_foto!="image/gif") {
					?>
		            <script type="text/javascript">
		            alert("Gunakan file yang benar");
		            window.location.href="home.php?page=edit_baju";
		            </script>
		            <?php
		}else{
		$destination="gambar/$nama_foto";
		move_uploaded_file($tmp_foto, $destination);
		$query=mysql_query("UPDATE baju set nama_baju='$nama',harga_pokok='$harga_pokok',harga_jual='$harga_jual',kategori='$kategori',keterangan='$keterangan',stok='$stok',gambar='$destination' where id_baju='$id_baju'");
		    if ($query) { ?>
		            <script type="text/javascript">
		            alert("Pakaian Berhasil Di Update");
		            window.location.href="home.php?page=baju";
		            </script>
		            <?php
            }else{
            		echo mysql_error();
            }   
		}
	}

	function tampil_transaksi(){
		$query=mysql_query("select customer.nama,transaksi.status,transaksi.tanggal,transaksi.id_transaksi,transaksi.id_subtransaksi from transaksi inner join customer on customer.id_customer=transaksi.id_customer");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}

	function detail_transaksi($id){
		$query=mysql_query("select baju.nama_baju,baju.harga_jual,subtransaksi.jumlah,subtransaksi.total_harga from subtransaksi inner join baju on baju.id_baju=subtransaksi.id_baju where encrypt='$id'");
		while ($r=mysql_fetch_array($query)) {
			$hasil[]=$r;
		}
		return $hasil;
	}

}
$root=new admin();
?>