<?php
	$nama   = $_POST['nama'];
	$harga  = $_POST['harga'];
	$stok   = $_POST['stok'];
	$suplier   = $_POST['suplier'];
	$dataValid="YA";
//===================================================
	$foto		= $_FILES['foto']['name'];
	$tmpName	= $_FILES['foto']['tmp_name'];
	$size		= $_FILES['foto']['size'];
	$type		= $_FILES['foto']['type'];

	$maxsize		= 1500000;
	$typeYgBoleh	= array("image/jpeg", "image/png", "image/pjpeg");

	$dirFoto	= "pict";
	if(!is_dir($dirFoto))
		mkdir($dirFoto);
	$fileTujuanFoto = $dirFoto."/".$foto;

	$dirThumb = "thumb";
	if(!is_dir($dirThumb))
		mkdir($dirThumb);
	$fileTujuanThumb = $dirThumb."/t_".$foto;

	if($size > 0){
		if($size > $maxsize){
			echo "Ukuran File Terlalu Besar <br/>";
			$dataValid="TIDAK";
		}
		if(!in_array($type, $typeYgBoleh)){
			echo "Type File Tidak Dikenal <br/>";
			$dataValid="TIDAK";
		}
	}
//==============================================
	if (strlen (trim($nama))==0) {
		echo "Nama Barang Harus Diisi ! <br/>";
		$dataValid = "TIDAK";		
	}	
	if (strlen (trim($harga))==0) {
		echo "Harga Harus Diisi ! <br/>";
		$dataValid = "TIDAK";		
	}	
	if (strlen (trim($stok))==0) {
		echo "Harga Harus Diisi ! <br/>";
		$dataValid = "TIDAK";		
	}	
	if (strlen (trim($suplier))==0) {
		echo "Nama Suplier Harus Diisi ! <br/>";
		$dataValid = "TIDAK";		
	}
	if ($dataValid == "TIDAK") {
		echo "Masih Ada Kesalahan, silahkan perbaiki ! </br>";
		echo "<input type='button' value='Kembali'
			onClick='self.history.back()'>";
		exit;
	}

	include "latihan_koneksi.php";
//========================================
	$sql = "insert into barang
			(suplier,nama,harga,stok,foto)
			values
			('$suplier','$nama','$harga','$stok','$foto')";
//========================================
	$hasil = mysqli_query($kon, $sql);

	if (!$hasil) {
		echo "Gagal Simpan, silahkan diulangi! <br/>";
		echo mysqli_error($kon);
		echo "<br/> <input type='button' value='Kembali'
			onClick='self.history.back()'>";
		exit;
	}
	else {
		echo "Simpan Data Berhasil" ;
	}
//==========================================
	if($size > 0){
		if(!move_uploaded_file($tmpName, $fileTujuanFoto)){
			echo "Gagal Upload Gambar..<br/>";
			echo "<a href='barang_tampil.php'>Daftar Barang</a>";
			exit;
		}else{
			buat_thumbail($fileTujuanFoto, $fileTujuanThumb);
		}
	}

	echo "<br/>File sudah diupload. <br/>";

	function buat_thumbail($file_src, $file_dst){
		//hapus jika thumbail sebelumnya sudah ada
		list($w_src, $h_src, $type) = getimagesize($file_src);

		switch ($type) {
			case 1 : // gif -> jpg
				$img_src = imagecreatefromgif($file_src);
				break;
			
			case 2 : // jpeg -> jpg
				$img_src = imagecreatefromjpeg($file_src);
				break;

			case 3 : // png -> jpg
				$img_src = imagecreatefrompng($file_src);
				break;
		}

		$thumb = 100; //max. size ut thumb
		if($w_src > $h_src){
			$w_dst = $thumb; //landscape
			$h_dst = round($thumb / $w_src * $h_src);
		} else {
			$w_dst = round($thumb / $w_src * $h_src); //portrait
			$h_dst = $thumb;
		}

		$img_dst = imagecreatetruecolor($w_dst, $h_dst); //resample

		imagecopyresampled($img_dst, $img_src, 0, 0, 0, 0, $w_dst, $h_dst, $w_src, $h_src);
		imagejpeg($img_dst, $file_dst); //simpan thumbail
		//bersihkan memori
		imagedestroy($img_src);
		imagedestroy($img_dst);
	}

	/*------------------------------*/
?>
<hr/>
<a href="latihan_tampil.php" /><img src="cetak.png" width="70px" height="70px"/></a>