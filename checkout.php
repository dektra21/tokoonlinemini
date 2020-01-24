<?php
    require 'array-barang.php'; 

  date_default_timezone_set("Asia/Makassar");
  $showtime = date("H : i");
  $showdate = date("d-m-Y");
  $_SESSION['date'] = $showdate;
  $_SESSION['time'] = $showtime;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/uikit.min.css" />
    <link
        href="https://fonts.googleapis.com/css?family=Baloo+Bhai|Bangers|Bitter|Bowlby+One+SC|Indie+Flower|Poppins&display=swap"
        rel="stylesheet">
    <script src="js/uikit.min.js"></script>
    <script src="js/uikit-icons.min.js"></script>
    <title>Keranjang Belanja</title>
    <style>
        .uk-button-danger {
            border-radius: 5px;
        }

        .uk-button-danger:hover {
            border-color: #f0506e;
            background-color: white;
            color: #f0506e;
            transition: 0.10s;
            border-radius: 5px;
        }

        .uk-button-primary {
            background-color: #1e87f0;
            color: white;
            border-radius: 5px;
        }

        .uk-button-primary:hover {
            border-color: #1e87f0;
            background-color: white;
            color: #1e87f0;
            transition: 0.10s;
            border-radius: 5px;
        }

        .garis {
            background-color: black;
        }
    </style>
</head>

<body class="uk-animation-fade">

    <?php
        require 'index-navbar.php';
    ?>
    <h2 class="uk-heading-bullet" style="padding-left:30px; font-family: 'Poppins', sans-serif;">Keranjang Belanja Anda
    </h2>
    <div class="uk-overflow-auto" style="padding-left:30px; padding-right:30px;">

        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
                <tr>

                    <th class="uk-table-shrink uk-text-center">Gambar Barang</th>
                    <th class="uk-table-expand uk-text-center">Nama Barang</th>
                    <th class="uk-width-medium uk-text-center">Jumlah</th>
                    <th class="uk-width-medium uk-text-center">Total Harga</th>
                    <th class="uk-table-shrink uk-text-nowrap uk-text-center"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['barang']) || count($_SESSION['barang']) > 0):
                    $totalBarang = 0;
                    $totalHarga2  = 0;
                    foreach ($_SESSION['barang'] as $key => $value):
                    $nama = $barang[$key]['nama'];
                    $harga = $barang[$key]['harga'];
                    $gambar = $barang[$key]['gambar'];

                    $totalHarga = $harga *  $value;
                    
            ?>
                <tr class="uk-text-center">
                    <td><img class="uk-preserve-width uk-border-circle" src="<?= $gambar ?>" width="60" alt=""></td>
                    <td class="uk-table-link"> <?= $nama ?></td>
                    <td class="uk-text-truncate"><?=$value?></td>
                    <td class="uk-text-truncate"><?="Rp " . number_format($totalHarga, 2, ",", ".")?> </td>
                </tr>
                <?php
                $totalBarang += $value;
                $totalHarga2 += $harga * $value;
                endforeach;
                ?>
                <tr>
                    <td colspan="5" rowspan="5" style="padding-left:1100px; font-family: 'Poppins', sans-serif;">Total
                        Barang = <?= $totalBarang ?><br>Total Harga &nbsp; =
                        <?= "Rp " . number_format($totalHarga2, 2, ",", ".")?></td>
                </tr>

                <?php
                    else:
                        echo 'Kosong';
                    endif;
                ?>
            </tbody>
        </table>

        <div class="uk-padding">

            <legend class="uk-legend">Data Anda :</legend><br>
            <form action="proses-form-pembeli.php" method="post">

                <div class="uk-margin">
                    <dl class="uk-description-list">
                        <dt>Nama Anda</dt>
                        <dd><?= $_SESSION['nama']?></dd>
                        <dt>Alamat Anda</dt>
                        <dd><?= $_SESSION['alamat'] ?></dd>
                        <dt>No Telepon Anda</dt>
                        <dd><?= $_SESSION['telepon']?></dd>
                    </dl>
                    <a class="uk-button uk-button-primary" href="#modal-center" uk-toggle>HAYU BELI!!</a>

                    <div id="modal-center" class="uk-flex-top" uk-modal>
                        <div class="uk-modal-dialog uk-modal-body uk-margin-auto-vertical">

                            <button class="uk-modal-close-default" type="button" uk-close></button>
                            <h2 style="font-family: 'Baloo Bhai'" class="uk-heading-line uk-text-center">WARUNK DEKTRA
                            </h2>
                            <dl class="uk-description-list">
                                <dt>Kode Barang</dt>
                                </dt>
                                <dd>#1234</dd>
                                <dt>Nama Anda</dt>
                                <dd><?= $_SESSION['nama']?></dd>
                                <dt>Alamat Anda</dt>
                                <dd><?= $_SESSION['alamat'] ?></dd>
                                <dt>No Telepon Anda</dt>
                                <dd><?= $_SESSION['telepon']?></dd>
                                <dt>Tanggal Beli</dt>
                                <dd><?= $_SESSION['date']?></dd>
                                <dt>Waktu Beli</dt>
                                <dd> <?= $_SESSION['time']?></dd>
                            </dl>
                            <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
                                <thead>
                                    <tr>
                                        <th class="uk-table-expand uk-text-center">Nama Barang</th>
                                        <th class="uk-width-medium uk-text-center">Jumlah</th>
                                        <th class="uk-width-medium uk-text-center">Total Harga</th>
                                        <th class="uk-table-shrink uk-text-nowrap uk-text-center"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                if (isset($_SESSION['barang']) || count($_SESSION['barang']) > 0):
                    $totalBarang = 0;
                    $totalHarga2  = 0;
                    foreach ($_SESSION['barang'] as $key => $value):
                    $nama = $barang[$key]['nama'];
                    $harga = $barang[$key]['harga'];
                    $gambar = $barang[$key]['gambar'];

                    $totalHarga = $harga *  $value;
                    
            ?>
                                    <tr class="uk-text-center">
                                        <td class="uk-table-link"> <?= $nama ?></td>
                                        <td class="uk-text-truncate"><?=$value?></td>
                                        <td class="uk-text-truncate">
                                            <?="Rp " . number_format($totalHarga, 2, ",", ".")?> </td>
                                    </tr>
                                    <?php
                $totalBarang += $value;
                $totalHarga2 += $harga * $value;
                endforeach;
                ?>
                                    <tr>
                                        <td colspan="5" rowspan="5"
                                            style="padding-left:250px; font-family: 'Poppins', sans-serif;">Total
                                            Barang = <?= $totalBarang ?><br>Total Harga &nbsp; =
                                            <?= "Rp " . number_format($totalHarga2, 2, ",", ".")?></td>
                                    </tr>

                                    <?php
                    else:
                        echo 'Kosong';
                    endif;
                ?>
                            </table>
                            </table>
                            <hr class="garis">
                            <p align="center">Makasi Ya, Udah Belanja Disini, Semoga Barangnya Bagus :)</p>
                        </div>
                    </div>


                </div>

            </form>

        </div>
    </div>

</body>

</html>