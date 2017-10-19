<?php include "asset.php"; 

		session_start();
?>
<nav>
<div class="container">
	<ul class="left">
		<li><a href="index.php">KARDI ONLINE SHOP</a></li>
	</ul>
	<ul class="listaa">
		<li><a href="">Kategori <i class="fa fa-chevron-down"></i></a>
		<ul class="asd">
			<?php $root->show_categori(); ?>
		</ul>
		</li>
		<li>
			<form action="pencarian.php" method="get">
				<input type="search" name="nama" placeholder="Cari baju...">
			</form>
		</li>
	</ul>
	<ul class="right">
		<li><a href="index.php"><i class="fa fa-home"></i> Home</a></li>
		<?php 
		if (isset($_SESSION['username'])) {
			?>
		<li><a href="transaksi.php"><i class="fa fa-money"></i> Transaksi</a></li>
		<li><a href="keranjang.php"><i class="fa fa-shopping-cart"></i> Keranjang<span class="sumproduct"><?php $root->keranjang($_SESSION["id"]);  ?></span></a></li>
		<li><a href="hand.php?action=logout"><i class="fa fa-user"></i> <?= $_SESSION["nama"] ?>, Logout</a></li>
			<?php
		}else{
		 ?>
		<li><a style="padding-left:10px;cursor:pointer" id="btn-login"><i class="fa fa-sign-in"></i> Login</a></li>
		<li><a href="daftar.php" class="btn-dftr"><i class="fa fa-sign-in"></i> Daftar</a></li>
		<li><a href="admin/index.php" class="btn-dftr"><i class="fa fa-sign-in"></i> Admin</a></li>
		<?php } ?>
		<div class="both"></div>
	</ul>
	<div class="both"></div>
</div>
</nav>
<div class="loginbox" id="loginbox">
	<table>
		<tr>
			<td><form action="hand.php?action=login" method="post">
					<tr>
						<td><input type="text" name="username" placeholder="Username"></td>
					</tr>
					<tr>
						<td><input type="password" name="password" placeholder="Password"></td>
					</tr>
					<tr>
						<td><input type="submit" value="Login"></td>
					</tr>
				</form>
			</td>
		</tr>
	</table>
</div>