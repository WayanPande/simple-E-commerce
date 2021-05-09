<?php



if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if (sizeof($data['user'])) {

        $hash = $data['user'][0]['password'];
        $id = $data['user'][0]['id_level'];

        if (password_verify($password, $hash)) {
            // echo "
            // <script>
            //     alert('Login Berhasil');
            //     document.location.href = 'home/index/'" .  $data['user'][0]['akun_id'] . "';
            // </script>";
            if ($id == 2) {
                header("Location: home/indexPenjual/");
                exit;
            } else {
                header("Location: home/indexPembeli/");
                exit;
            }
        } else {
            $pass = true;
        }
    } else {

        $user = true;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body style="background-color: #E3F7F7;">
    <!-- FORM LOGIN -->
    <section id="contact">
        <div class="container">
            <div class="row text-center mt-5 pt-5">
                <div class="col">
                    <img src="<?= BASEURL; ?>/img/s.png" class="" alt="..." style="width: 200px;">
                </div>

                <!-- <i class='bx bx-layer bx-tada-hover' style="font-size: 90px;"></i> -->
            </div>
            <div class="row text-center mb-3 mt-3">
                <div class="col">
                    <h2>Please sign in</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <?php if (isset($user)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Username tidak ditemukan!</strong> Ulangi input username.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php elseif (isset($pass)) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Password salah!</strong> Ulangi input password.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <form name="portfolio-contact-form" method="post" class="needs-validation">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" id="username" required>
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" id="password" required>
                            <label for="floatingPassword">Password</label>
                        </div>
                        <div class="row mt-5">
                            <div class="d-grid gap-2 col-12">
                                <button type="submit" class="btn btn-primary btn-kirim" name="login">Sign in</button>

                                <!-- Button trigger modal -->

                                <p>Don't have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#registrasi" class="text-decoration-none">Sign up now</a>.</p>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col text-center">
                            <p>or sign up with:</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            <button class="btn btn-primary rounded-circle" type="submit"><i class="bi bi-facebook"></i></button>
                            <button class="btn btn-primary rounded-circle ms-2" type="submit"><i class="bi bi-google"></i></button>
                            <button class="btn btn-primary rounded-circle ms-2" type="submit"><i class="bi bi-twitter"></i></button>
                            <button class="btn btn-primary rounded-circle ms-2" type="submit"><i class="bi bi-github"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="registrasi" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="judulModal">Sign Up</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/login/tambah" method="post" class="needs-validation" novalidate>


                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" required>
                            <div class="invalid-feedback">
                                Silahkan isi nama anda.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="NoHp">NoHp</label>
                            <input type="number" class="form-control" id="NoHp" name="NoHp" required>
                            <div class="invalid-feedback">
                                Silahkan isi No Hp anda.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                            <div class="invalid-feedback">
                                Silahkan isi alamat email anda.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control" id="alamat" name="alamat" required>
                            <div class="invalid-feedback">
                                Silahkan isi alamat tempat tinggal anda.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="Username">Username</label>
                            <input type="text" class="form-control" id="Username" name="Username" required>
                            <div class="invalid-feedback">
                                Please choose a username.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <div class="invalid-feedback">
                                Silahkan isi password anda.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="jurusan" required>Jenis Akun</label>
                            <select class="form-select" id="jurusan" name="id_level">
                                <option selected disabled value="">Choose...</option>
                                <option value="2">Penjual</option>
                                <option value="3">Pembeli</option>
                            </select>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal USER/PASS Salah -->
    <div class="modal fade " id="getCodeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

    <script src="<?= BASEURL; ?>/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</body>

</html>