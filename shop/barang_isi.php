<form action = "barang_simpan.php" method = "post" enctype="multipart/form-data">
<fieldset>
<table border = "0" align="center" >
<h2 align="center">INPUT DATA BARANG</h2><hr/>
<tr>
	<td>Suplier</td>
	<td><input type="text" name="suplier" /></td>
</tr>
<tr>
	<td>Nama Barang</td>
	<td><input type="text" name="nama" /></td>
</tr>
<tr>
	<td>Harga Jual</td>
	<td><input type="text" name="harga" /></td>
</tr>
<tr>
	<td>Stok</td>
	<td><input type="text" name="stok" /></td>
</tr>
<!-- tambahan -->
<tr>
	<td>Gambar</td>
	<td><input type="file" name="foto"></td>
</tr>
<!-- =============================== -->

<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Simpan" name="proses" />
	<input type="reset" value="Reset" name="reset" />
	</td>
</tr>
</table>
</fieldset>
</form>