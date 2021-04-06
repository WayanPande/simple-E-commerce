<br>

<div class="container mt-3">
    <h1>Daftar Produk</h1>
    <div class="row justify-content-start">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row justify-content-between mt-3">
        <div class="col-4">
            <form class="d-flex" method="post" action="<?= BASEURL; ?>/produk/cariPembeli">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
                <button class="btn btn-outline-success" type="submit" id="tombol-cari">Search</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-start mt-5">
        <!-- <div class="col-lg-6">
            <table class="table table-bordered border-dark mp-t5 table-hover" id="container">
                <thead>
                    <tr>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['produk'] as $prd) : ?>
                        <tr>
                            <td><?= $prd['Nama_Produk']; ?></td>
                            <td><?= $prd['Stok']; ?></td>
                            <td><?= $prd['Harga_Jual']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/produk/keranjang/<?= $prd['ProdukID']; ?>" onclick="return confirm('yakin?');"><span class="badge bg-secondary">Tambah</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div> -->
        <div class="col-lg-6">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped tablesorter" id="container">
                    <thead>
                        <tr>
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php foreach ($data['produk'] as $prd) : ?>
                        <tr>
                            <td><?= $prd['Nama_Produk']; ?></td>
                            <td><?= $prd['Stok']; ?></td>
                            <td><?= $prd['Harga_Jual']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/produk/keranjang/<?= $prd['ProdukID']; ?>" onclick="return confirm('yakin?');"><span class="badge bg-secondary">Tambah</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</div>