<fieldset>
<a href ="barang_isi.php" >Input Barang</a> 
&nbsp; &nbsp; &nbsp;
<a href="barang_cari.php">Cari Barang</a>
&nbsp; &nbsp; &nbsp;
<a href="latihan_cari.php">Cari Suplier</a>
<table border="1">
	<tr>
		<th>Foto</th>
		<th>Nama Barang</th>
		<th>Harga Jual</th>
		<th>Stok</th>
		<th>Suplier</th>
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
		  	echo " </tr> ";
		}
	?>	
</table>
</fieldset>