<?php
session_start();
if(!isset($_SESSION["user"])){
	echo "Sesi sudah Habis<br/>
		<a href='login.php'>Login Kembali</a>";
		exit;
}
echo "SELAMAT DATANG<br/>";
echo "User : ".$_SESSION["user"]."<br/>";
echo "Nama : ".$_SESSION["namalengkap"]."<br/>";
?>
<hr/>
<div id="menu">
	<h2>Link</h2>
	<a href="halaman_1.php">Halaman 1</a><br/>
	<a href="halaman_2.php">Halaman 2</a><br/>
	<a href="logout.php">Logout</a><br/>
</div>