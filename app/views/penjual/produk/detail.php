<div class="container">
    <div class="row">
        <div class="col-md-7 col-lg-3 mt-5">
            <img src="<?= BASEURL; ?>/img/s.png" class="" alt="..." style="width: 200px;">
        </div>
        <div class="col-md-5 col-lg-9 mt-5">
            <p class="fs-2 fw-bold lh-sm"><?= $data['produk'][0]['Nama_Produk']; ?></p>
            <p class="text-muted fs-6"><?= $data['produk'][0]['ProdukID']; ?> |
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
                <ion-icon name="star-outline"></ion-icon>
            </p>
            <form action="<?= BASEURL; ?>/produk/ubahDataBarang" method="post">
                <div class="row">
                    <div class="col-2">
                        <p class="fs-6 fw-bold ">Nama barang</p>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="text" value="<?= $data['produk'][0]['Nama_Produk']; ?>" name="nama" aria-label="default input example">
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="fs-6 fw-bold ">Harga</p>
                    </div>
                    <div class="col-3">
                        <div class="input-group">
                            <span class="input-group-text" id="basic-addon1">Rp</span>
                            <input class="form-control" type="number" value="<?= $data['produk'][0]['Harga_Jual']; ?>" name="harga" aria-label="default input example">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-2">
                        <p class="fs-6 fw-bold ">Stok</p>
                    </div>
                    <div class="col-3">
                        <input class="form-control" type="number" value="<?= $data['produk'][0]['Stok']; ?>" name="stok" aria-label="default input example">
                    </div>
                </div>
                <input type="text" value="<?= $data['produk'][0]['ProdukID']; ?>" name="id" hidden>
                <div class="row mt-5">
                    <div class="col-5">
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="<?= BASEURL; ?>/produk" type="button" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>