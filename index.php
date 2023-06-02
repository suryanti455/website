<!DOCTYPE html>
<html lang="en">
<head>
<title>Data Pembayaran SPP</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php
include('class/Database.php');
include('class/Spp.php');
  ?>
<center><h1>Aplikasi Data  Pembayaran SPP </center></h1>
<hr/>
<p>
<a href="index.php">Home</a>
<a href="index.php?file=spp&aksi=tampil">Data Spp</a>
<a href="index.php?file=spp&aksi=tambah">Tambah Data Pembayaran SPP</a>
</p>
<hr/>
<?php
if(isset($_GET['file'])){
include($_GET['file'].'.php');
} else {
echo '<h1 align="center">Selamat Datang</h1>';
}
?>
</body>
</html>