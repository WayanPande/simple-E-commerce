<div class="container">
    <div class="row justify-content-center" data-aos="zoom-out-down">
        <div class="col-lg">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="<?= BASEURL; ?>/img/b1.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= BASEURL; ?>/img/b2.jpg" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="<?= BASEURL; ?>/img/b3.jpg" class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>


    <div class="row mt-4">
        <div class="col-sm-3" data-aos="fade-right">
            <div class="left-sidebar">
                <h2>Category</h2>
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
        </div>
        <div class="col-sm-9">
            <div class="features_items">
                <h2 class="title text-center" data-aos="fade-left">Features Items</h2>
                <div class="row">
                    <?php foreach ($data['produk'] as $prd) : ?>
                        <div class="col-sm-4 align-self-center" data-aos="zoom-in">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?= BASEURL; ?>/img/tumbnail.png" alt="" />
                                        <p class="mt-4 text-start ms-5 ps-5 text-decoration-line-through text-muted">Rp <?= $prd['Harga_Jual'] * 2; ?></p>
                                        <h2>Rp <?= $prd['Harga_Jual']; ?></h2>
                                        <p><?= $prd['Nama_Produk']; ?></p>
                                        <a href="<?= BASEURL; ?>/produk/detail/<?= $prd['ProdukID']; ?>" class="btn btn-default add-to-cart"><i class="bi bi-cart-fill"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
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