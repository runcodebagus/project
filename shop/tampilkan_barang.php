<?php
	/*tambahan*/
	$nama_barang = "" ;
	if(isset($_POST["nama_barang"])) 
	$nama_barang = $_POST["nama_barang"] ;
	/*-----*/

	include "koneksi2.php";

	$sql = "select * from barang where nama like '%".
			$nama_barang."%' order by idbarang desc ";  /*modifikasi*/
	
	$hasil = mysqli_query($kon,$sql);
	
	if (!$hasil)
	  die("Gagal query..".mysqli_error($kon));
?>

<a href ="barang_isi.php" >INPUT BARANG</a> 

<!-- tambahan -->
&nbsp; &nbsp; &nbsp;
<a href="barang_cari.php">CARI BARANG</a>
<!-- ========= -->

<table border="1">
	<tr>
		<th>Foto</th>
		<th>Nama Barang</th>
		<th>Harga Jual</th>
		<th>Stok</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil)) {
			echo " <tr> ";

			/*----tambahan----*/
		  	echo " <td> <a href='pict/{$row['foto']} ' />
				 <img src='thumb/t_{$row['foto']} ' width='100' />
				 </a> </td> " ;
			/*----------*/
		  	echo " <td> ".$row['nama']." </td> " ;
		  	echo " <td> ".$row['harga']." </td> " ;
		  	echo " <td> ".$row['stok']." </td> " ;
		  	echo " </tr> ";
		}
	?>	
</table>