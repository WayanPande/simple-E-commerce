<br>

<div class="container mt-3">
    <h1 data-aos="fade-right">Daftar Produk</h1>
    <div class="row justify-content-start">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row justify-content-between mt-3" data-aos="zoom-out">
        <div class="col-3">
            <div class="d-grid">
                <a class="btn btn-outline-primary" href="<?= BASEURL; ?>/produk/tambah" role="button">Tambah Data Produk</a>
            </div>
        </div>
        <div class="col-4">
            <form class="d-flex" method="post" action="<?= BASEURL; ?>/produk/cari">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
                <button class="btn btn-outline-success" type="submit" id="tombol-cari">Search</button>
            </form>
        </div>
    </div>
    <!-- <div class="row justify-content-end mt-3">
        <div class="col-3">
            <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#exampleModal">
                Advance search
            </button>
        </div>

    </div> -->

    <div class="row justify-content-start mt-5">
        <?php foreach ($data['produk'] as $prd) : ?>
            <div class="col-sm-3 align-self-center" data-aos="zoom-in">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="<?= BASEURL; ?>/img/s.png" alt="" />
                            <h2 class="mt-3">Rp <?= $prd['Harga_Jual']; ?></h2>
                            <p><?= $prd['Nama_Produk']; ?></p>
                            <a href="<?= BASEURL; ?>/produk/detailPenjual/<?= $prd['ProdukID']; ?>" class="btn btn-default add-to-cart"><i class="bi bi-cart-fill"></i>Edit</a>
                            <button type="button" class="btn btn-default add-to-cart" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="bi bi-trash-fill"></i>Hapus
                            </button>
                            <!-- <a href="<?= BASEURL; ?>/produk/hapus/<?= $prd['ProdukID']; ?>" class="btn btn-default add-to-cart"><i class="bi bi-trash-fill"></i>Hapus</a> -->
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah anda yakin?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <a type="button" class="btn btn-primary" href="<?= BASEURL; ?>/produk/hapus/<?= $prd['ProdukID']; ?>">Hapus</a>
            </div>
        </div>
    </div>
</div>

<style>
    .product-image-wrapper {
        border: 2px solid #F7F7F5;
        overflow: hidden;
        margin-bottom: 30px;
        border-radius: 8px;
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

    .product-image-wrapper:hover {
        transform: scale(1.15);
        box-shadow: 0 10px 10px rgba(0, 0, 0, .06), 0 4px 8px rgba(0, 0, 0, .06);
        margin-left: 20px;
        margin-right: 20px;
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