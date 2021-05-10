<?php

if (!isset($data['jumlah_order'][0]['pendapatan'])) {
    $data['jumlah_order'][0]['pendapatan'] = 0;
}

?>
<br>
<div class="container">
    <div class="col-lg-12 mt-5">
        <div class="jumbotron">
            <!-- <h1 class="display-4">Selamat Datang <?= $_SESSION['user']['user'][0]['nama']; ?></h1>
            <p class="lead">Hallo nama saya <?= $_SESSION['user']['user'][0]['nama']; ?></p> -->
            <h1 class="display-4">Penting hari ini</h1>
            <p class="lead text-muted">Aktivitas yang perlu kamu pantau untuk jaga kepuasan pembeli</p>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="card h-100 text-white" style="background-color: #007FFF;">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                        <!-- <ion-icon name="chatbubbles" style="font-size: 100px;"></ion-icon> -->
                        <i class="bi bi-cart-fill ms-4" style="font-size: 90px;"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;"><?= $data['jumlah_order'][0]['jumlah']; ?></p>
                            <p class="text-end">Pesanan baru</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark"> ‍ </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card h-100 text-white" style="background-color: #007FFF;">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                        <!-- <ion-icon name="checkmark-sharp" style="font-size: 100px;"></ion-icon> -->
                        <i class="bi bi-wallet2 ms-4" style="font-size: 80px;"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;"><?= $data['pendapatan']['pendapatan']; ?></p>
                            <p class="text-end">Pendapatan hari ini</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark"> ‍ </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card h-100 text-white" style="background-color: #007FFF;">
                <div class="row g-0">
                    <div class="col-md-4 mt-4">
                        <ion-icon name="stats-chart-sharp" style="font-size: 100px;"></ion-icon>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;"><?= $data['random'][1]; ?></p>
                            <p class="text-end">Ulasan baru</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark"> ‍ </small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card h-100 text-white" style="background-color: #007FFF;">
                <div class="row g-0">
                    <div class="col-md-4 mt-4">
                        <ion-icon name="chatbubbles" style="font-size: 100px;"></ion-icon>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;"><?= $data['random'][2]; ?></p>
                            <p class="text-end">Chat baru</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark"> ‍ </small>
                </div>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i>Statistik tokomu minggu ini</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Pendapatan bersih baru</h6>
                                    <h5 class="card-title fw-bold" style="font-size: 30px;">Rp <?= $data['jumlah_order'][0]['pendapatan']; ?></h5>
                                    <p class="card-text">-12% dari 7 hari terakhir</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h6 class="card-subtitle mb-2 text-muted">Produk dilihat</h6>
                                    <h5 class="card-title fw-bold" style="font-size: 30px;"><?= $data['random'][3]; ?></h5>
                                    <p class="card-text">-7% dari 7 hari terakhir</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="morris-chart-area"></div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white pt-0 pb-0">
                    <p class="text-start mt-3" style="font-size: 20px;">
                        <ion-icon name="pricetag-sharp"></ion-icon> Transaksi terakhir
                    </p>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped tablesorter">
                            <thead>
                                <tr>
                                    <th>Order # <i class="fa fa-sort"></i></th>
                                    <th>Order Date <i class="fa fa-sort"></i></th>
                                    <th>Order Time <i class="fa fa-sort"></i></th>
                                    <th>Amount (IDR) <i class="fa fa-sort"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['transaksi'] as $trs) : ?>
                                    <tr>
                                        <td style="font-size: 14px;"><?= $trs['id_transaksi']; ?></td>
                                        <td style="font-size: 14px;"><?= $trs['tanggal']; ?></td>
                                        <td style="font-size: 14px;"><?= $trs['jam']; ?></td>
                                        <td style="font-size: 14px;">Rp <?= $trs['TotalHarga']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="text-end">
                        <a href="<?= BASEURL; ?>/analytics">Lihat Selengkapnya <i class="bi bi-arrow-right-circle-fill"></i></ion-icon></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white pt-0 pb-0 mb-3">
                    <p class="text-start mt-3" style="font-size: 20px;">
                        <ion-icon name="ribbon"></ion-icon> Produk terlaris di tokomu
                    </p>
                </div>
                <?php if ($data['terlaris'] != null) : ?>
                    <?php foreach ($data['terlaris'] as $tls) : ?>
                        <?php $x = 0; ?>
                        <?php if ($x == 2) : ?>
                            <div class="card-body mb-3">
                                <div class="row mb-2">
                                    <div class=" col-3 mt-4">
                                        <img src="<?= BASEURL; ?>/img/s.png" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-5">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text fw-bold fs-4"><?= $tls['Nama_Produk']; ?></p>
                                                <p class="card-text text-muted">Stok Terjual : <?= $tls['kuantitas']; ?> barang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="card-body mt-1">
                                <div class="row">
                                    <div class="col-3 mt-4">
                                        <img src="<?= BASEURL; ?>/img/s.png" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-5">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text fw-bold fs-4"><?= $tls['Nama_Produk']; ?></p>
                                                <p class="card-text text-muted">Stok Terjual : <?= $tls['kuantitas']; ?> barang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="width:90%;text-align:right;margin-left:20px" class="mt-0 mb-0">
                        <?php endif; ?>
                        <?php $x++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white pt-0 pb-0 mb-3">
                    <p class="text-start mt-3" style="font-size: 20px;">
                        <ion-icon name="alert-circle"></ion-icon> Tambahkan stok produkmu
                    </p>
                </div>
                <?php if ($data['stok'] != null) : ?>
                    <?php foreach ($data['stok'] as $stk) : ?>
                        <?php $x = 0; ?>
                        <?php if ($x == 2) : ?>
                            <div class="card-body mb-3">
                                <div class="row mb-2">
                                    <div class=" col-3 mt-4">
                                        <img src="<?= BASEURL; ?>/img/s.png" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-5">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text fw-bold fs-4"><?= $stk['Nama_Produk']; ?></p>
                                                <p class="card-text text-muted">Sisa Stok : <?= $stk['Stok']; ?> barang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <div class="card-body mt-1">
                                <div class="row">
                                    <div class="col-3 mt-4">
                                        <img src="<?= BASEURL; ?>/img/s.png" class="card-img-top" alt="...">
                                    </div>
                                    <div class="col-5">
                                        <div class="card" style="width: 18rem;">
                                            <div class="card-body">
                                                <p class="card-text fw-bold fs-4"><?= $stk['Nama_Produk']; ?></p>
                                                <p class="card-text text-muted">Sisa Stok : <?= $stk['Stok']; ?> barang</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="width:90%;text-align:right;margin-left:20px" class="mt-0 mb-0">
                        <?php endif; ?>
                        <?php $x++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div><!-- /.row -->
</div>