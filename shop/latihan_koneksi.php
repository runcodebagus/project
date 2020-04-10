<?php
error_reporting(E_ALL ^ E_DEPRECATED);
$host = "localhost";
$user = "root";
$pass = "rootroot";
$sdname = "toko_ol";

$kon = mysqli_connect($host,$user,$pass);
if(!$kon)
	die("Gagal Koneksi ke database..!");
	
$hasil = mysqli_select_db($kon, $sdname);
if(!$hasil){
	$hasil = mysqli_query($kon, "CREATE DATABASE $sdname");
	if(!$hasil)
		die("Gagal Buat Database..!");
	else
		$hasil = mysqli_select_db($kon, $sdname);
		if(!$hasil)die("Gagal Konek Database..!");
}

$sqlTableBarang = "create table if not exists barang(
	idbarang int auto_increment not null primary key,
	nama varchar(40) not null,
	harga int not null default 0,
	stok int not null default 0,
	suplier varchar(40) not null,
	foto varchar(70) not null default '',
	KEY(nama))";
mysqli_query($kon, $sqlTableBarang) or die("Gagal Buat Table Barang");

$sqlTableHjual = "create table if not exists hjual(
				idhjual int auto_increment not null primary key,
				tanggal date not null,
				namapem varchar(40) not null,
				email varchar(40) not null default '',
				notelp varchar(20) not null default '')";
mysqli_query($kon, $sqlTableHjual) or die("Gagal Buat Table Hjual");

$sqlTableDjual = "create table if not exists djual(
				iddjual int auto_increment not null primary key,
				idhjual int not null,
				idbarang int not null,
				qty int not null,
				harga int not null)";
mysqli_query($kon, $sqlTableDjual) or die("Gagal Buat Table Djual");

$sqlTbaleUser = "create table if not exists pengguna(
				idpengguna int auto_increment not null primary key,
				user varchar(25) not null,
				password varchar(50) not null,
				nama_lengkap varchar(50) not null,
				akses varchar(10) not null
				)";
mysqli_query($kon, $sqlTbaleUser) or die("Gagal Buat Table Pengguna");

$sql = "select * from pengguna";
$hasil = mysqli_query($kon, $sql);
$jumlah = mysqli_num_rows($hasil);
if($jumlah == 0){
	$sql = "insert into pengguna(user, password, nama_lengkap, akses)
			values ('admin',md5('admin'),'administrator','toko'),
					('cust',md5('cust'),'pelanggan','beli')";
	mysqli_query($kon,$sql);
}
?>