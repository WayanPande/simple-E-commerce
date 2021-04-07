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
            <a class="btn btn-primary" href="<?= BASEURL; ?>/produk/tambah" role="button">Tambah Data Produk</a>
        </div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary col-4 " data-bs-toggle="modal" data-bs-target="#exampleModal">
            Launch demo modal
        </button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4">
            <form class="d-flex" method="post" action="<?= BASEURL; ?>/produk/cari">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" id="keyword" name="keyword">
                <button class="btn btn-outline-success" type="submit" id="tombol-cari">Search</button>
            </form>
        </div>
    </div>

    <div class="row justify-content-start mt-5">
        <div class="col">
            <table class="table table-bordered border-dark mp-t5" id="container">
                <thead>
                    <tr>
                        <th scope="col">ID Produk</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Stok</th>
                        <th scope="col">ID Kategori</th>
                        <th scope="col">Harga Jual</th>
                        <th scope="col">Harga Beli</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['produk'] as $prd) : ?>
                        <tr>
                            <th scope="row"><?= $prd['ProdukID']; ?></th>
                            <td><?= $prd['Nama_Produk']; ?></td>
                            <td><?= $prd['Stok']; ?></td>
                            <td><?= $prd['KategoriID']; ?></td>
                            <td><?= $prd['Harga_Jual']; ?></td>
                            <td><?= $prd['Harga_Beli']; ?></td>
                            <td>
                                <a href="<?= BASEURL; ?>/produk/hapus/<?= $prd['ProdukID']; ?>" onclick="return confirm('yakin?');"><span class="badge bg-secondary">Hapus</span></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>