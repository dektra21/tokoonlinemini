<?php
    require 'array-barang.php'; 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/uikit.min.css" />
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
                    <td class="uk-text-nowrap"><a href="delete.php?id=<?= $key ?>"
                            class="uk-button uk-button-danger uk-card-hover">HAPUS DARI KERANJANG</a></td>

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

        <h2 class="uk-heading-line uk-text-center"><span>Masukkan Data Anda</span></h2>

        <div class="uk-text-center">
        
        
         <form action="proses-form-pembeli.php" method="post">

                <label style="color:white;">Nama / Username</label>
                <div class="uk-width-1-1">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: user"></span>
                        <input class="uk-input" type="text" placeholder="Masukkan Nama " value="<?= isset($_SESSION['nama']) ? $_SESSION['nama'] : '';?>" name="namapembeli" required>
                    </div>
                </div>

                <label style="color:white;">Alamat</label>
                <div class="">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: home"></span>
                        <input class="uk-input" type="text" placeholder="Masukkan Alamat " value="<?= isset($_SESSION['alamat']) ? $_SESSION['alamat'] : '';?>" name="alamatpembeli" required>
                    </div>
                </div>

                <label style="color:white;">No Telp / No HP</label>
                <div class="">
                    <div class="uk-inline">
                        <span class="uk-form-icon" uk-icon="icon: receiver"></span>
                        <input class="uk-input" type="tel" placeholder="081-XXX-XXX-XXX" value="<?= isset($_SESSION['telepon']) ? $_SESSION['telepon'] : '';?>" name="teleponpembeli"
                            pattern="[0-9]{3}-[0-9]{3}-[0-9]{3}-[0-9]{3}" required>
                    </div>
                </div>
                <br>

                    <button type="submit" class="uk-button uk-button-primary uk-card-hover">Lanjut Membeli</button>



                </div>
        
        </div>
           

            </form>

        </div>
    </div>
</body>

</html>