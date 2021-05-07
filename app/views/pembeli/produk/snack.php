<br>

<div class="container mt-3">
    <h1>Daftar Produk Snack</h1>
    <div class="row justify-content-center mt-3">
        <div class="col-9">
            <form class="d-flex" method="post" action="<?= BASEURL; ?>/produk/cariPembeli">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
                <button class="btn btn-outline-success" type="submit" id="tombol-cari">Search</button>
            </form>
        </div>
    </div>
    <div class="row justify-content-start mt-3">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row justify-content-start mt-5">
        <div class="col-sm-3">
            <div class="left-sidebar">
                <h2>Kategori</h2>
                <div class="panel-group category-products" id="accordian">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/bahan_makanan">Bahan Makanan</a></h4>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/snack">Snack</a></h4>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/minuman">Minuman</a></h4>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/obat">Obat-Obatan</a></h4>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/pakaian">Pakaian</a></h4>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/atk">ATK</a></h4>
                        </div>
                    </div>


                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title"><a href="<?= BASEURL; ?>/produk/perabotan">Perabotan RT</a></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left-sidebar">
                <h2>Lokasi</h2>
                <div class="panel-group category-products" id="accordian">
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            DKI Jakarta
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Jabodetabek
                        </label>
                    </div>
                    <div class="form-check ms-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                        <label class="form-check-label" for="flexCheckDefault">
                            Bali
                        </label>
                    </div>
                    <div class="row mt-3">
                        <div class="col align-self-end">
                            <button class="btn btn-outline-success cek btn-sm" type="submit" id="tombol-cari">Terapkan</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="left-sidebar">
                <h2>Harga</h2>
                <div class="panel-group category-products" id="accordian">
                    <form action="<?= BASEURL; ?>/produk/cariHarga" method="POST">
                        <div class="row">
                            <div class="col-10">
                                <div class="input-group mb-3 ms-4">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" class="form-control" placeholder="Harga Minimum" aria-label="Username" aria-describedby="basic-addon1" name="minimum">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-10">
                                <div class="input-group mb-3 ms-4">
                                    <span class="input-group-text" id="basic-addon1">Rp</span>
                                    <input type="text" class="form-control" placeholder="Harga Maksimum" aria-label="Username" aria-describedby="basic-addon1" name="maksimum">
                                </div>
                            </div>
                        </div>
                        <input type="text" hidden value="K0002" name="hal">
                        <div class="row mt-3">
                            <div class="col align-self-end">
                                <button class="btn btn-outline-success cek btn-sm" type="submit" id="tombol-cari" name="harga">Terapkan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-9">
            <div class="features_items">
                <h2 class="title text-center">Features Items</h2>
                <div class="row">
                    <?php foreach ($data['produk'] as $prd) : ?>
                        <div class="col-sm-3 align-self-center" data-aos="zoom-in">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?= BASEURL; ?>/img/s.png" alt="" />
                                        <h2 class="mt-3">Rp <?= $prd['Harga_Jual']; ?></h2>
                                        <p><?= $prd['Nama_Produk']; ?></p>
                                        <a href="<?= BASEURL; ?>/produk/detail/<?= $prd['ProdukID']; ?>" class="btn btn-default add-to-cart"><i class="bi bi-cart-fill"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col">
                        <?php if ($data['jumlahHalaman'] > 1) :  ?>
                            <ul class="pagination justify-content-center">
                                <?php if ($data['halaman'] == 1) : ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="<?= BASEURL; ?>/<?= $_GET['url']; ?>&halaman=<?= $data['halaman'] - 1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= BASEURL; ?>/<?= $_GET['url']; ?>&halaman=<?= $data['halaman'] - 1; ?>" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                                <?php for ($i = 1; $i <= $data['jumlahHalaman']; $i++) : ?>
                                    <?php if ($i == $data['halaman']) : ?>
                                        <li class="page-item active"><a class="page-link" href="<?= BASEURL; ?>/<?= $_GET['url']; ?>&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php else : ?>
                                        <li class="page-item"><a class="page-link" href="<?= BASEURL; ?>/<?= $_GET['url']; ?>&halaman=<?= $i; ?>"><?= $i; ?></a></li>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <?php if ($data['halaman'] == $data['jumlahHalaman']) : ?>
                                    <li class="page-item disabled">
                                        <a class="page-link" href="<?= BASEURL; ?>/<?= $_GET['url']; ?>&halaman=<?= $data['halaman'] + 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php else : ?>
                                    <li class="page-item">
                                        <a class="page-link" href="<?= BASEURL; ?>/<?= $_GET['url']; ?>&halaman=<?= $data['halaman'] + 1; ?>" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><?= $data['produk'][0]['ProdukID']; ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

<style>
    .cek {
        margin-left: 210px;
    }

    /* #FE980F */
    .padding-right {
        padding-right: 0;
    }

    h2.title {
        color: #0275d8;
        font-family: 'Roboto', sans-serif;
        font-size: 18px;
        font-weight: 700;
        margin: 0 15px;
        text-transform: uppercase;
        margin-bottom: 30px;
        position: relative;
    }

    h2.title:before {
        content: " ";
        position: absolute;
        background: #fff;
        bottom: -6px;
        width: 220px;
        height: 30px;
        z-index: -1;
        left: 50%;
        margin-left: -110px;
    }

    .features_items {
        overflow: hidden;
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

    .category-products {
        border: 2px solid #F7F7F0;
        margin-bottom: 35px;
        padding-bottom: 20px;
        padding-top: 15px;
        border-radius: 8px;
    }

    .product-image-wrapper {
        border: 2px solid #F7F7F5;
        overflow: hidden;
        margin-bottom: 30px;
        border-radius: 8px;
    }

    .single-products {
        position: relative;
    }

    .productinfo h2 {
        color: #0275d8;
        font-family: 'Roboto', sans-serif;
        font-size: 24px;
        font-weight: 700;
    }


    .productinfo p {
        font-family: 'Roboto', sans-serif;
        font-size: 14px;
        font-weight: 400;
        color: #696763;
    }

    .productinfo img {
        width: 100%;
    }

    .productinfo {
        position: relative;
    }


    .add-to-cart {
        background: #F5F5ED;
        border: 0 none;
        border-radius: 0;
        color: #696763;
        font-family: 'Roboto', sans-serif;
        font-size: 15px;
        margin-bottom: 25px;
    }

    .add-to-cart:hover {
        background: #0275d8;
        border: 0 none;
        border-radius: 0;
        color: #FFFFFF;
    }

    .add-to {
        margin-bottom: 10px;
    }

    .add-to-cart i {
        margin-right: 5px;
    }

    .add-to-cart:hover {
        background: #0275d8;
        color: #FFFFFF;
    }
</style>