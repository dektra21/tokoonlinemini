<?php
session_start();

$namapembeli = $_POST['namapembeli'];
$alamatpembeli = $_POST['alamatpembeli'];
$teleponpembeli = $_POST['teleponpembeli'];
 
$_SESSION['nama'] = $namapembeli;
$_SESSION['alamat'] = $alamatpembeli;
$_SESSION['telepon'] = $teleponpembeli;

header("Location:checkout.php");





?>