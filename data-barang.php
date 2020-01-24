
<div class="uk-grid-medium uk-child-width-1-3@s uk-text-center" uk-grid style="padding-left:50px; padding-right:50px; ">

    <?php

        foreach ($barang as $key=>$value):
            $namaBarang = $value['nama'];
            $harga = $value['harga'];
            $gambar = $value['gambar'];
                           
    ?>
    <div class=" uk-text-center">
        <div class="uk-card uk-card-body uk-card-hover uk-inline-clip uk-transition-toggle" tabindex="0" >
            <img src="<?= $gambar ?>" alt="" width="325px;">
            <div class="uk-transition-slide-bottom uk-position-bottom uk-overlay uk-overlay-default">
                <p style="color:black;"> <b><?= $namaBarang ?></b> </p>
                <p style="color:black;"><?= "Rp " . number_format($harga, 2, ",", ".") ?></p>
                <div uk-lightbox>
                    <a href="detail.php?id=<?= $key ?>" class="uk-button uk-button-text" style="color:black;"
                        data-caption=" Detail Barang <?= $namaBarang ?> ">Lihat
                        Detail</a>
                </div>

            </div>
        </div>
    </div>
    
    <?php

            endforeach;

     ?>

</div>
<br>