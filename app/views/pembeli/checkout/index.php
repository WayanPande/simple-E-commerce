<div class="container">
    <main>
        <div class="py-5 text-center" data-aos="fade-down">
            <h2>Checkout</h2>
        </div>

        <div class="row g-5">
            <div class="col-md-5 col-lg-4 order-md-last" data-aos="fade-left">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-primary">Keranjang</span>
                    <span class="badge bg-primary rounded-pill"><?= $_SESSION['keranjang']['total']; ?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php foreach ($data['keranjang'] as $krj) : ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm">
                            <div>
                                <h6 class="my-0" id="nama_barang"><?= $krj['Nama_Produk']; ?> x <?= $krj['kuantitas']; ?></h6>
                                <a class="text-muted btn btn-sm" href="<?= BASEURL; ?>/produk/hapusDataKeranjang/<?= $krj['ProdukID']; ?>/<?= $krj['akun_id']; ?>" role="button"><span class="badge bg-danger">hapus</span></a>
                            </div>
                            <span class="text-muted">Rp <?= $krj['Harga']; ?></span>
                        </li>
                    <?php endforeach; ?>
                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (IDR)</span>
                        <strong>Rp <?= $data['total']['totalHarga']; ?></strong>
                    </li>
                </ul>

                <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <button type="submit" class="btn btn-secondary">Redeem</button>
                    </div>
                </form>
            </div>
            <div class="col-md-7 col-lg-8" data-aos="fade-right">
                <h4 class="mb-3">Dikirim ke</h4>
                <form class="needs-validation" novalidate method="post" action="<?= BASEURL; ?>/checkout/order">
                    <div class="row g-3">
                        <div class="col-12">
                            <label for="firstName" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="firstName" placeholder="" value="<?= $_SESSION['user']['user'][0]['nama']; ?>" name="nama" required>
                            <div class="invalid-feedback">
                                Valid name is required.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                            <input type="email" class="form-control" id="email" placeholder="you@example.com" value="<?= $_SESSION['user']['user'][0]['email']; ?>" name="email">
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address" class="form-label">Alamat</label>
                            <input type="text" class="form-control" id="address" placeholder="1234 Main St" name="alamat" value="<?= $_SESSION['user']['user'][0]['alamat']; ?>" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="col-12">
                            <label for="address2" class="form-label">Alamat 2 <span class="text-muted">(Optional)</span></label>
                            <input type="text" class="form-control" id="address2" placeholder="Apartment or suite" name="alamat2">
                        </div>

                        <div class="col-md-4">
                            <label for="state" class="form-label">Pilih Pengiriman</label>
                            <select class="form-select" id="state" name="pengirim" required>
                                <option value="">Choose...</option>
                                <option value="PI001">JNE</option>
                                <option value="PI002">J&T</option>
                                <option value="PI003">TIKI</option>
                                <option value="PI004">Deliveree</option>
                            </select>
                            <div class="invalid-feedback">
                                Please provide a valid state.
                            </div>
                        </div>

                    </div>

                    <hr class="my-4">

                    <h4 class="mb-3">Payment</h4>

                    <div class="my-3">
                        <div class="form-check">
                            <input id="credit" name="paymentMethod" type="radio" class="form-check-input" checked>
                            <label class="form-check-label" for="credit">Credit card</label>
                        </div>
                        <div class="form-check">
                            <input id="debit" name="paymentMethod" type="radio" class="form-check-input">
                            <label class="form-check-label" for="debit">Debit card</label>
                        </div>
                        <div class="form-check">
                            <input id="paypal" name="paymentMethod" type="radio" class="form-check-input">
                            <label class="form-check-label" for="paypal">PayPal</label>
                        </div>
                    </div>

                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="cc-name" class="form-label">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="cc-number" class="form-label">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-expiration" class="form-label">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="">
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>

                        <div class="col-md-3">
                            <label for="cc-cvv" class="form-label">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="">
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <button class="w-100 btn btn-primary btn-lg" type="submit">Beli</button>
                </form>
            </div>
        </div>
    </main>
</div>