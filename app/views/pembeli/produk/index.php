<br>

<div class="container mt-3">
    <h1>Daftar Produk</h1>
    <div class="row justify-content-between mt-3">
        <div class="col-4">
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
                        <tr class="text-center">
                            <th scope="col">Nama Produk</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['produk'] as $prd) : ?>
                            <tr href="<?= BASEURL; ?>/produk/keranjang/<?= $prd['ProdukID']; ?>" class="text-center">
                                <td><?= $prd['Nama_Produk']; ?></td>
                                <td><?= $prd['Stok']; ?></td>
                                <td><?= $prd['Harga_Jual']; ?></td>
                                <td class="text-center">
                                    <!-- <a class="badge bg-danger" href="<?= BASEURL; ?>/produk/keranjang/<?= $prd['ProdukID']; ?>" onclick="return confirm('yakin?');">Tambah</a> -->
                                    <a href="<?= BASEURL; ?>/produk/detail/<?= $prd['ProdukID']; ?>" class="badge bg-primary">detail</a>
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