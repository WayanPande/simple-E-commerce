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
            <div class="row">
                <div class="col-2">
                    <p class="fs-6 fw-bold ">Harga</p>
                </div>
                <div class="col-3">
                    <p class="fs-3 text-primary mb-1">Rp <?= $data['produk'][0]['Harga_Jual']; ?></p>
                    <p class="fs-6">Harga sudah termasuk PPN</p>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <p class="fs-6 fw-bold ">Estimasi</p>
                </div>
                <div class="col-3">
                    <p class="fs-6">Siap dikirim 2-5 hari</p>
                </div>
            </div>
            <form action="<?= BASEURL; ?>/produk/keranjang/<?= $data['produk'][0]['ProdukID']; ?>" method="post">
                <div class="row">
                    <div class="col-2">
                        <p class="fs-6 fw-bold ">Jumlah</p>
                    </div>
                    <div class="col-3">
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <!-- <button type="button" class="btn btn-light" id="kurang">-</button> -->
                            <input type="number" class="form-control" name="jumlah" style="width: 70px;" value="1" id="jumlah" min="1" max="<?= $data['produk'][0]['Stok']; ?>">
                            <!-- <button type="button" class="btn btn-secondary" id="tambah">+</button> -->
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col">
                        <button type="submit" class="btn btn-primary">Tambah Keranjang</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>