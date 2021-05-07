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
            <div class="card h-100 text-white bg-primary">
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
                    <small class="text-dark">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card h-100 text-white bg-secondary">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                        <!-- <ion-icon name="checkmark-sharp" style="font-size: 100px;"></ion-icon> -->
                        <i class="bi bi-wallet2 ms-4" style="font-size: 80px;"></i>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;"><?= $data['jumlah_order'][0]['pendapatan']; ?></p>
                            <p class="text-end">Total Expenses</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card h-100 text-white bg-success">
                <div class="row g-0">
                    <div class="col-md-4 mt-4">
                        <ion-icon name="stats-chart-sharp" style="font-size: 100px;"></ion-icon>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;">456</p>
                            <p class="text-end">New Mentions!</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark">Last updated 3 mins ago</small>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card h-100 text-white bg-danger">
                <div class="row g-0">
                    <div class="col-md-4 mt-4">
                        <ion-icon name="chatbubbles" style="font-size: 100px;"></ion-icon>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="card-title text-end" style="font-size: 50px;">456</p>
                            <p class="text-end">New Mentions!</p>
                        </div>
                    </div>
                </div>
                <div class="card-footer bg-light mt-2">
                    <small class="text-dark">Last updated 3 mins ago</small>
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
                                    <h5 class="card-title fw-bold" style="font-size: 30px;"><?= rand(5, 50); ?></h5>
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
                        <a href="<?= BASEURL; ?>/analytics">View All Transactions <i class="bi bi-arrow-right-circle-fill"></i></ion-icon></a>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div>

<script>
    /* globals Chart:false, feather:false */

    (function() {
        'use strict'

        feather.replace()

        // Graphs
        var ctx = document.getElementById('myChart')
        // eslint-disable-next-line no-unused-vars
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: [
                    'Sunday',
                    'Monday',
                    'Tuesday',
                    'Wednesday',
                    'Thursday',
                    'Friday',
                    'Saturday'
                ],
                datasets: [{
                    data: [
                        15339,
                        21345,
                        18483,
                        24003,
                        23489,
                        24092,
                        12034
                    ],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false
                }
            }
        })
    })()
</script>