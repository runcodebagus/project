<div style="background:pink">
<h1>INI HALAMAN 1</h1>
<hr/>
<?php
session_start();
echo "SELAMAT DATANG<br/>";
echo "User : ".$_SESSION["user"]."<br/>";
echo "Nama : ".$_SESSION["namalengkap"]."<br/>";
?>
</div>