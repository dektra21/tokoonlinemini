<?php
        session_start();
        $_SESSION['barang'] = isset($_SESSION['barang']) ? $_SESSION['barang'] : [];

        $barang = [
            1 => [
                'nama' => 'KAMERA WIFI',
                'harga' => 1000000,
                'gambar' => 'kamera.jpg'
            ],
            2 => [
                'nama' => 'CAMCORDER',
                'harga' => 1000000,
                'gambar' => 'camcorder.jpg'
            ],
            3 => [
                'nama' => 'SLIM KEYBOARD',
                'harga' => 500000,
                'gambar' => 'slimkeyboard.jpg'
            ],
            4 => [
                'nama' => 'WEB CAM',
                'harga' => 1500000,
                'gambar' => 'webcam.jpg'
            ],
            5 => [
                'nama' => 'LAPTOP',
                'harga' => 10000000,
                'gambar' => 'laptop.jpg'
            ],

            6 => [
                'nama' => 'MONITOR FULL HD',
                'harga' => 15000000,
                'gambar' => 'hdmonitor.jpg'
            ],

        ];

?>