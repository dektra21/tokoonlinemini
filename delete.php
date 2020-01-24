<?php
require 'array-barang.php';

    $id = $_GET['id'];

        // hapus barang
        unset($_SESSION['barang'][$id]);

    header("Location:keranjang-belanja.php");


?>