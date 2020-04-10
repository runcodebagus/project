<?php
include"koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
   
	if($username == ""){
	?>
    <script>
    alert("Aduh Gagal Login!!!");
    history.go(-1);
    </script>
    <?
	}elseif($password == ""){
	?>
    <script>
    alert("Aduh Gagal Login!!!\nSilahkan Ulangi Kembali");
    history.go(-1);
    </script>
	<?
    
	}else{
    $query = mysql_query("SELECT username,password FROM user WHERE username='$username' AND password='$password'") or die(mysql_error());
    $ada = mysql_num_rows($query); header("Location:fasilitas.php");;
}
?>