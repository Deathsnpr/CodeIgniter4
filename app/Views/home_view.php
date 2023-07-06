<?= $this->extend('components/layout') ?>
<?= $this->section('content') ?>
<?php
$session = session();
if ($session->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= $session->getFlashData('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
}
?>
<div class="row">
    <?php foreach ($produks as $index => $produk) : ?>
        <div class="col-lg-6">
            <?= form_open('keranjang') ?>
            <?php
            $hargaAwal = $produk['harga'];
            $diskon = $produk['diskon'];
            $hargaDiskon = $hargaAwal - ($hargaAwal * $diskon / 100);

            echo form_hidden('id', $produk['id']);
            echo form_hidden('nama', $produk['nama']);
            if ($produk['diskon'] == 0) {
                echo form_hidden('harga', $produk['harga']);
            } else {
                echo form_hidden('harga', $hargaDiskon);
            }
            echo form_hidden('foto', $produk['foto']);
            ?>
            <div class="card">
                <div class="card-body">
                    <?php
                    if ($produk['diskon']!=0) :
                    ?>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        <?= $produk['diskon']?>%<br>off
                        <span class="visually-hiden"></span>
                    </span>
                    <?php endif;?>
                    <img src="<?= base_url() . "public/img/" . $produk['foto'] ?>" alt="..." width="500px">
                    <h5 class="card-title">
                        <?= $produk['nama'] ?><br>
                        <?php
                        if ($produk['diskon'] == 0) {
                            echo number_to_currency($produk['harga'], 'IDR');
                        } else {
                            echo number_to_currency($hargaDiskon, 'IDR');
                        }
                        ?>
                    </h5>
                    <button type="submit" class="btn btn-info rounded-pill">Beli</button>
                </div>
            </div>
            <?= form_close() ?>
        </div>
    <?php endforeach ?>
</div>
<?= $this->endSection() ?>
