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
?>
<fieldset>
<table align="center"><tr><td>
<a href ="barang_isi.php" >Input Barang</a> 
&nbsp; &nbsp; &nbsp;
<a href="barang_cari.php">Cari Barang</a>
&nbsp; &nbsp; &nbsp;
<a href="latihan_cari.php">Cari Suplier</a>
</td></tr></table>
<table border="1" align="center">
	<tr>
		<th>Foto</th>
		<th>Nama Barang</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Suplier</th>
		<th>Operasi</th>
	</tr>
	<?php
		$no = 0;
		while ($row = mysqli_fetch_assoc($hasil)) {
			echo " <tr> ";
		  	echo " <td> <a href='pict/{$row['foto']} ' />
				 <img src='thumb/t_{$row['foto']} ' width='100' />
				 </a> </td> " ;
		  	echo " <td> ".$row['nama']." </td> " ;
		  	echo " <td> ".$row['harga']." </td> " ;
		  	echo " <td> ".$row['stok']." </td> " ;
			echo " <td> ".$row['suplier']." </td> " ;
			echo "<td> ";
			echo "<a href='edit_barang.php?idbarang=".$row['idbarang']."'>EDIT</a> &nbsp;&nbsp;&nbsp;";
			echo "<a href='hapus_barang.php?idbarang=".$row['idbarang']."'>HAPUS</a>";
			echo "</td> ";
		  	echo " </tr> ";
		}
	?>	
</table>
</fieldset>