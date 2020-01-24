<?php

require 'array-barang.php';

$jumlahbarang = $_POST['jumlah'];
$id = $_POST['id'];

if (array_key_exists($id,$_SESSION['barang'])) {
    // kalau barang ada di session
    $totalSebelumnya = $_SESSION['barang'][$id];
    $totalBaru       = $totalSebelumnya + $jumlahbarang;
    $_SESSION['barang'][$id] = $totalBaru;

}
else {
    // kalau barang gak ada di session
    $_SESSION['barang'][$id] = $jumlahbarang;
}

header("Location:detail.php?id=$id");

?>