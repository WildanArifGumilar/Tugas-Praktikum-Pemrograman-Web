<?php include "page/head.php" ?>
<style type="text/css">
	*{margin: 0;padding: 0;font-family: Arial;}
	body{background: #f1f1f1;}
	.daftar{background: #fff;width: 500px;margin: 0 auto;margin-top: 100px;}
	.daftar input{width: 100%;padding: 10px;box-sizing: border-box;margin-bottom: 20px;border:1px solid #ccc;}
	.daftar h3{color: #fff;font-size: 25px;margin-bottom: 10px;background: #4bcfc1;padding: 10px;}
	.dafta{padding: 30px;}
	.daftar input[type=submit]{background: #4bcfc1;border:0;color: #fff;text-transform: uppercase;}
</style>
<div class="daftar">
<h3>Daftar</h3>
<div class="dafta">
	<form action="hand.php?action=daftar" method="post">
		<input type="text" name="username" placeholder="Username">
		<input type="text" name="password" placeholder="Password">
		<input type="text" name="nama" placeholder="Nama">
		<input type="text" name="alamat" placeholder="Alamat">
		<input type="text" name="telfon" placeholder="Telfon">
		<input type="submit" value="daftar">
	</form>
</div>
</div>