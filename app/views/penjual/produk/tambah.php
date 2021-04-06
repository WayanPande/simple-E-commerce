<div class="container">
    <div class="row justify-content-center">
        <form class="col-5 mt-5" method="post" action="<?= BASEURL; ?>/produk/tambahData">
            <fieldset disabled="disabled">
                <div class="mb-3">
                    <label for="produkID" class="form-label">Produk ID</label>
                    <input type="text" id="produkID" class="form-control" placeholder="<?= $data['prd'] ?>" name="produkID">
                </div>
            </fieldset>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Produk</label>
                <input type="text" id="nama" class="form-control" name="nama">
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" id="stok" class="form-control" name="stok">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select class="form-select" aria-label="Default select example" name="id_kategori">
                    <option selected disabled value="">Choose...</option>
                    <option value="K0001">Bahan Makanan</option>
                    <option value="K0002">Snack</option>
                    <option value="K0003">Minuman</option>
                    <option value="K0004">Obat-Obatan</option>
                    <option value="K0005">Pakaian</option>
                    <option value="K0006">ATK</option>
                    <option value="K0007">Perabotan RT</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="hargaJual" class="form-label">Harga Jual</label>
                <input type="number" id="hargaJual" class="form-control" name="hargaJual">
            </div>
            <div class="mb-3">
                <label for="hargaBeli" class="form-label">Harga Beli</label>
                <input type="number" id="hargaBeli" class="form-control" name="hargaBeli">
            </div>
            <fieldset disabled="disabled">
                <div class="mb-3">
                    <label for="penjualID" class="form-label">Penjual ID</label>
                    <input type="text" id="penjualID" class="form-control" placeholder="<?= $_SESSION['user']['user'][0]['akun_id'] ?>" name="penjualID">
                </div>
            </fieldset>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
</div>
<br><br>