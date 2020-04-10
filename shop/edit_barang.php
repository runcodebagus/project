<?php
	$idbarang = $_GET["idbarang"];
	include "latihan_koneksi.php";
	
	$sql = "select * from barang where idbarang = '$idbarang'";
	$hasil = mysqli_query($kon,$sql);
	
	if(!$hasil) die("Gagal query");
	
	$data = mysqli_fetch_array($hasil);
	$nama = $data["nama"];
	$harga = $data["harga"];
	$stok = $data["stok"];
	$foto = $data["foto"];
	$suplier = $data["suplier"];
?>
<form action = "simpan_edit_barang.php" method = "post" enctype="multipart/form-data">
<input type="hidden" name="idbarang" value="<?php echo $idbarang;?>"/>
<fieldset>
<h2 align="center">==EDIT BARANG==</h2>
<table border = "0" align="center" >
<tr>
	<td>Suplier</td>
	<td><input type="text" name="suplier" value="<?php echo $suplier;?>"/></td>
</tr>
<tr>
	<td>Nama Barang</td>
	<td><input type="text" name="nama" value="<?php echo $nama;?>" /></td>
</tr>
<tr>
	<td>Harga Jual</td>
	<td><input type="text" name="harga" value="<?php echo $harga;?>"/></td>
</tr>
<tr>
	<td>Stok</td>
	<td><input type="text" name="stok" value="<?php echo $stok;?>"/></td>
</tr>

<tr>
	<td>Gambar</td>
	<td>
		<input type="file" name="foto">
		<input type="hidden" name="foto_lama" value="<?php echo $foto;?>"/><br/>
		<img src="<?php echo "thumb/t_".$foto;?>" width="100px"/>
	</td>
</tr>
<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Simpan" name="proses" />
	<input type="reset" value="Reset" name="reset" />
	</td>
</tr>
</table>
</fieldset>