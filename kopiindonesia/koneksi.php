<?php
$host="localhost";
$userdb="root";
$passdb="rootroot";
$namadb="kopiindonesia";

$conect=mysql_connect($host,$userdb,$passdb)  or die (mysql_error());
mysql_select_db($namadb,$conect) or die (mysql_error());
?>