<br>
<div class="container">
    <h1 class="mt-4 mb-4">About Me</h1>
    <div class="row">
        <div class="col-lg-4 text-center">
            <ion-icon name="person-circle" style="font-size: 250px;"></ion-icon>
            <p><?= $data['nama']; ?></p>
            <div class="d-grid gap-2 col-7 mx-auto">
                <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit profile</button>
            </div>
        </div>
        <div class="col-lg-5 mt-3">
            <label for="firstName" class="form-label fw-bold fs-2 mt-3">Profile</label>
            <br>
            <label for="firstName" class="form-label mt-3">Nama</label>
            <p class="mt-2">email@example.com</p>
            <hr class="my-1">
            <br>
            <label for="firstName" class="form-label mt-3">Alamat</label>
            <p class="mt-2">email@example.com</p>
            <hr class="my-1">
            <br>
            <label for="firstName" class="form-label mt-3">No Hp</label>
            <p class="mt-2">email@example.com</p>
            <hr class="my-1">
            <br>
            <label for="firstName" class="form-label mt-3">Email</label>
            <p class="mt-2">email@example.com</p>
            <hr class="my-1">
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
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>