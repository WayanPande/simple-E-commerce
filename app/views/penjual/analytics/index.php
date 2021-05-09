<br>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1>Order Detail</h1>
        </div>
    </div>
    <div class="row justify-content-end">
        <div class="col-4">
            <form class="d-flex" method="post" action="<?= BASEURL; ?>/analytics/cari">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
                <button class="btn btn-outline-success" type="submit" id="tombol-cari">Search</button>
            </form>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Tanggal</h2>
                <div class="panel-group category-products" id="accordian">
                    <form action="<?= BASEURL; ?>/analytics/cariTanggal" method="POST">
                        <div class="row">
                            <div class="col-10">
                                <div class="input-group mb-3 ms-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-date"></i></span>
                                    <input type="text" class="form-control datepicker" placeholder="Tanggal Minimum" aria-label="Username" aria-describedby="basic-addon1" name="minimum">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10">
                                <div class="input-group mb-3 ms-4">
                                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-calendar-date"></i></span>
                                    <input type="text" class="form-control" placeholder="Tanggal Maksimum" aria-label="Username" aria-describedby="basic-addon1" name="maksimum">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col ms-4">
                                <p class="text-muted">format: yy-mm-dd</p>
                            </div>
                        </div>
                        <input type="text" hidden value="all" name="hal">
                        <div class="row">
                            <div class="col align-self-center">
                                <button class="btn btn-outline-success cek btn-sm" type="submit" id="tombol-cari" name="harga">Terapkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="left-sidebar">
                <h2>Rata - Rata</h2>
                <div class="panel-group category-products" id="accordian">
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-hover table-striped tablesorter">
                                            <thead>
                                                <tr>
                                                    <th>#<i class="fa fa-sort"></i></th>
                                                    <th>Nama Barang<i class="fa fa-sort"></i></th>
                                                    <th>Terjual<i class="fa fa-sort"></i></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $x = 1; ?>
                                                <?php foreach ($data['ratarata'] as $ord) : ?>
                                                    <tr class="text-center">
                                                        <td><?= $x++; ?></td>
                                                        <td><?= $ord['ProdukID']; ?></td>
                                                        <td><?= $ord['rata_rata']; ?></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="text-end">
                                        <a href="<?= BASEURL; ?>/analytics/ratarata">Lihat Selengkapnya <i class="bi bi-arrow-right-circle-fill"></i></ion-icon></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->
                    <!-- <div class="row">
                        <div class="col-11 ms-3">
                            <div class="d-grid">
                                <a class="btn btn-outline-primary" href="<?= BASEURL; ?>/analytics/ratarata" role="button">Detail</a>
                            </div>
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
        <div class="col-lg">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter" id="container">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">Order #</th>
                            <th scope="col">Order Date</th>
                            <th scope="col">Order Time</th>
                            <th scope="col">ID Produk</th>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['order'] as $ord) : ?>
                            <tr href="<?= BASEURL; ?>/produk/keranjang/<?= $ord['ProdukID']; ?>" class="text-center">
                                <td><?= $ord['id_transaksi']; ?></td>
                                <td><?= $ord['tanggal']; ?></td>
                                <td><?= $ord['jam']; ?></td>
                                <td><?= $ord['ProdukID']; ?></td>
                                <td><?= $ord['Nama_Produk']; ?></td>
                                <td><?= $ord['kuantitas']; ?></td>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .cek {
        margin-left: 210px;
    }

    .category-products {
        border: 2px solid #F7F7F0;
        margin-bottom: 35px;
        padding-bottom: 20px;
        padding-top: 15px;
        border-radius: 8px;
    }

    .category-products .panel {
        background-color: #FFFFFF;
        border: 0px;
        border-radius: 0px;
        box-shadow: none;
        margin-bottom: 0px;
    }

    .category-products .panel-default .panel-heading {
        background-color: #FFFFFF;
        border: 0 none;
        color: #FFFFFF;
        padding: 5px 20px;
    }

    .category-products .panel-default .panel-heading .panel-title a {
        color: #696763;
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        text-decoration: none;
        text-transform: uppercase;
    }

    .left-sidebar h2 {
        color: #0275d8;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: 700;
        margin: 0 auto 30px;
        text-align: center;
        text-transform: uppercase;
        position: relative;
        z-index: 3;
    }

    .left-sidebar h2:after,
    h2.title:after {
        content: " ";
        position: absolute;
        border: 1px solid #f5f5f5;
        bottom: 8px;
        left: 0;
        width: 100%;
        height: 0;
        z-index: -2;
    }

    .left-sidebar h2:before {
        content: " ";
        position: absolute;
        background: #fff;
        bottom: -6px;
        width: 130px;
        height: 30px;
        z-index: -1;
        left: 50%;
        margin-left: -65px;
    }
</style>