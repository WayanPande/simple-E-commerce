<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman <?= $data['judul']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- custom css -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.css">
</head>

<body id="body-pd">
    <header class="header mb-5" id="header">
        <div class="header__toggle">
            <i class='bx bx-menu' id="header-toggle"></i>
        </div>
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                <ion-icon name="person-sharp"></ion-icon>
                <?= $_SESSION['user']['user'][0]['akun_id']; ?>
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenu2">
                <li><a href="<?= BASEURL; ?>/about" class="dropdown-item" type="button">Profile</a></li>
                <li><a href="<?= BASEURL; ?>/login" class="dropdown-item" type="button">Log Out</a></li>
            </ul>
        </div>
    </header>

    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div>
                <a href="<?= BASEURL; ?>/home/indexPenjual" class="nav__logo">
                    <i class='bx bx-layer nav__logo-icon'></i>
                    <span class="nav__logo-name">Supermart</span>
                </a>

                <div class="nav__list">
                    <a href="<?= BASEURL; ?>/home/indexPenjual" class="nav__link__dashboard">
                        <i class='bx bx-grid-alt nav__icon'></i>
                        <span class="nav__name">Dashboard</span>
                    </a>
                    <!-- 
                    <a href="<?= BASEURL; ?>/about" class="nav__link__message">
                        <i class='bx bx-message-square-detail nav__icon'></i>
                        <span class="nav__name">About</span>
                    </a> -->

                    <a href="<?= BASEURL; ?>/produk" class="nav__link">
                        <!-- <i class='bx bx-bookmark nav__icon'></i> -->
                        <i class="bi bi-bag-check nav__icon"></i>
                        <span class="nav__name">Produk</span>
                    </a>

                    <a href="<?= BASEURL; ?>/analytics" class="nav__link">
                        <i class='bx bx-bar-chart-alt-2 nav__icon'></i>
                        <span class="nav__name">Analytics</span>
                    </a>
                </div>
            </div>

            <a href="<?= BASEURL; ?>/login" class="nav__link">
                <i class='bx bx-log-out nav__icon'></i>
                <span class="nav__name">Log Out</span>
            </a>
        </nav>
    </div>