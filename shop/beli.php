<h2 align="center">DAFTAR PEMBELI BARANG</h2>
<form action="simpan_beli.php" method="post">
<table border="0" align="center">
<tr>
	<td>Nama</td>
	<td>: <input type="text" name="namapem"/></td> 
</tr>
<tr>
	<td>Email</td>
	<td>: <input type="text" name="email"/></td>
</tr>
<tr>
	<td>No. Telp</td>
	<td>: <input type="text" name="notelp"/></td>
</tr>
<tr>
	<td colspan="2" align="right">
	<input type="submit" value="Simpan"/>
	</td>
</table>
</form>
<?php include_once("keranjang_belanja.php");