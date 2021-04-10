<br>
<div class="container">
    <div class="col-lg-12 mt-5">
        <div class="jumbotron">
            <h1 class="display-4">Selamat Datang <?= $_SESSION['user']['user'][0]['nama']; ?></h1>
            <p class="lead">Hallo nama saya <?= $_SESSION['user']['user'][0]['nama']; ?></p>

            <ol class="breadcrumb text-muted" style="background-color: #F7F6FB;">
                <ion-icon name="speedometer" class="mt-1 ms-1 me-2"></ion-icon>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-3">
            <div class="card h-100 text-white bg-primary">
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
        <div class="col-lg-3">
            <div class="card h-100 text-white bg-secondary">
                <div class="row g-0">
                    <div class="col-md-4 mt-4">
                        <ion-icon name="checkmark-sharp" style="font-size: 100px;"></ion-icon>
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
                    <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Traffic Statistics: October 1, 2013 - October 31, 2013</h3>
                </div>
                <div class="card-body">
                    <div id="morris-chart-area"></div>
                </div>
            </div>
        </div>
    </div><!-- /.row -->

    <div class="row mt-4">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <p class="text-start mt-3" style="font-size: 20px;">
                        <ion-icon name="pricetag-sharp"></ion-icon> Recent Transaction
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
                </div>
            </div>
        </div>
    </div><!-- /.row -->
</div>