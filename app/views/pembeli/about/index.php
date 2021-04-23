<br>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h1 class="mt-4 mb-4 about">About Me</h1>
        </div>
    </div>
    <div class="row justify-content-start">
        <div class="col-6">
            <?php Flasher::flash(); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 text-center" data-aos="fade-right" data-aos-delay="200">
            <ion-icon name="person-circle" style="font-size: 250px;"></ion-icon>
            <p><?= $data['akun'][0]['nama']; ?></p>
            <div class="d-grid gap-2 col-7 mx-auto">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit profile</button>
            </div>
        </div>
        <div class="col-lg-5 mt-3">
            <label for="firstName" class="form-label fw-bold fs-2 mt-3" data-aos="fade-right" data-aos-delay="300">Profile</label>
            <br>
            <label for="firstName" class="form-label mt-3" data-aos="fade-right" data-aos-delay="400">Nama</label>
            <p class="mt-2" data-aos="fade-right" data-aos-delay="500"><?= $data['akun'][0]['nama']; ?></p>
            <hr class="my-1" data-aos="fade-right" data-aos-delay="600">
            <br>
            <label for="firstName" class="form-label mt-3" data-aos="fade-right" data-aos-delay="700">Alamat</label>
            <p class="mt-2" data-aos="fade-right" data-aos-delay="800"><?= $data['akun'][0]['alamat']; ?></p>
            <hr class="my-1" data-aos="fade-right" data-aos-delay="900">
            <br>
            <label for="firstName" class="form-label mt-3" data-aos="fade-right" data-aos-delay="1000">No Hp</label>
            <p class="mt-2" data-aos="fade-right" data-aos-delay="1100"><?= $data['akun'][0]['NoHp']; ?></p>
            <hr class="my-1" data-aos="fade-right" data-aos-delay="1200">
            <br>
            <label for="firstName" class="form-label mt-3" data-aos="fade-right" data-aos-delay="1300">Email</label>
            <p class="mt-2" data-aos="fade-right" data-aos-delay="1400"><?= $data['akun'][0]['email']; ?></p>
            <hr class="my-1" data-aos="fade-right" data-aos-delay="1500">
        </div>

        <div class="col-lg-2 text-center">

            <!-- <p>Halo, nama saya <?= $data['nama']; ?>, umur saya <?= $data['umur']; ?> tahun, saya adalah seorang <?= $data['pekerjaan']; ?></p> -->
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
                <form action="<?= BASEURL; ?>/about/update" method="post" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['akun'][0]['nama']; ?>" required>
                        <div class="invalid-feedback">
                            Silahkan isi nama anda.
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $data['akun'][0]['alamat']; ?>" required>
                        <div class="invalid-feedback">
                            Silahkan isi alamat anda.
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="NoHp">NoHp</label>
                        <input type="text" class="form-control" id="NoHp" name="NoHp" value="<?= $data['akun'][0]['NoHp']; ?>" required>
                        <div class="invalid-feedback">
                            Silahkan isi NoHp anda.
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= $data['akun'][0]['email']; ?>" required>
                        <div class="invalid-feedback">
                            Silahkan isi email anda.
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>