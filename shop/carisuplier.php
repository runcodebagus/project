<?php
	$suplier = "" ;
	if(isset($_POST["suplier"])) 
	$suplier = $_POST["suplier"] ;

	include "latihan_koneksi.php";

	$sql = "select * from barang where suplier like '%".
			$suplier."%' order by idbarang desc ";
	$hasil = mysqli_query($kon,$sql);
	if (!$hasil)
	  die("Gagal query..".mysqli_error($kon));
	  
	include "latihan_tampil.php";
?>