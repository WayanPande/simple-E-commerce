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
    <div class="row mt-4 justify-content-center">
        <div class="col-lg-6">
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