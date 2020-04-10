<?php
	$nama_barang = "" ;
	if(isset($_POST["nama_barang"])) 
	$nama_barang = $_POST["nama_barang"] ;

	include "latihan_koneksi.php";
	$sql = "select * from barang where nama like '%".
			$nama_barang."%' order by idbarang desc ";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil)
	  die("Gagal query..".mysqli_error($kon));

	include "ekse_cari_barang.php";
?>
