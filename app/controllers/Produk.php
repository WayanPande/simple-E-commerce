<?php

class Produk extends Controller
{

    private $jumlahDataPerHalaman = 5;

    public function index()
    {
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->modelPenjual('Produk_model')->getAllProduk();
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('produk/index', $data);
        $this->viewPenjual('templates/footer');
    }

    public function all()
    {
        $data['judul'] = 'Daftar Produk';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countAllProduk());
        $data['produk'] = $this->modelPenjual('Produk_model')->getAllProdukPembeli($halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/index', $data);
        $this->viewPembeli('templates/footer');
    }

    public function tambah()
    {
        $data['judul'] = 'Input Produk';
        $data['prd'] = $this->modelPenjual('Produk_model')->ambilProdukID();
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('produk/tambah', $data);
        $this->viewPenjual('templates/footer');
    }

    public function tambahData()
    {
        // var_dump($_POST);
        if ($this->modelPenjual('Produk_model')->tambahDataProduk($_POST) > 0) {

            Flasher::setFlash('Produk', 'berhasil', 'ditambahkan', 'success');
            echo "
            <script>
                alert('Login Berhasil');
            </script>";
            header('Location: ' . BASEURL . '/produk');
            exit;
        } else {
            echo "
            <script>
                alert('Login Gagal');
            </script>";
        }
    }

    public function hapus($id)
    {
        if ($this->modelPenjual('Produk_model')->hapusDataProduk($id) > 0) {

            Flasher::setFlash('Produk', 'berhasil', 'dihapus', 'success');
            echo "
            <script>
                alert('Login Berhasil');
            </script>";
            header('Location: ' . BASEURL . '/produk');
            exit;
        } else {
            echo "
            <script>
                alert('Login Gagal');
            </script>";
        }
    }

    public function cari()
    {
        // var_dump($_POST);
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->modelPenjual('Produk_model')->cariDataProduk($_POST['keyword']);
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('produk/index', $data);
        $this->viewPenjual('templates/footer');
    }

    public function cariPembeli()
    {
        // var_dump($_POST);
        $data['judul'] = 'Daftar Produk';
        if (isset($_POST['cari'])) {
            $_SESSION['keyword'] = $_POST['keyword'];
        }

        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }

        $jumlahData = count($this->modelPenjual('Produk_model')->countCariDataProduk($_SESSION['keyword']));
        $data['produk'] = $this->modelPenjual('Produk_model')->cariDataProduk($_SESSION['keyword'], $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/index', $data);
        $this->viewPembeli('templates/footer');
    }

    public function keranjang($id)
    {

        if ($this->modelPembeli('Keranjang_model')->tambah($id, $_POST['jumlah']) > 0) {

            $_SESSION['keranjang'] = $this->modelPembeli('Keranjang_model')->totalBarang();
            Flasher::setFlash('Produk', 'berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/produk/all');
            exit;
        } else {
            echo "
            <script>
                alert('Login Gagal');
            </script>";
        }
    }

    public function hapusDataKeranjang($id, $akun)
    {
        if ($this->modelPembeli('Keranjang_model')->hapusDataKeranjang($id, $akun) > 0) {

            $_SESSION['keranjang'] = $this->modelPembeli('Keranjang_model')->totalBarang();
            // Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/checkout');
            exit;
        } else {
            echo "
            <script>
                alert('Login Gagal');
            </script>";
        }
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Produk';
        $data['produk'] = $this->modelPembeli('Keranjang_model')->cariDataProduk($id);
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/detail', $data);
        $this->viewPembeli('templates/footer');
    }

    public function detailPenjual($id)
    {
        $data['judul'] = 'Detail Produk';
        $data['produk'] = $this->modelPembeli('Keranjang_model')->cariDataProduk($id);
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('produk/detail', $data);
        $this->viewPenjual('templates/footer');
    }

    public function bahan_makanan()
    {
        $data['judul'] = 'Daftar Bahan Makanan';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0001"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0001", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/bahan_makanan', $data);
        $this->viewPembeli('templates/footer');
    }

    public function snack()
    {
        $data['judul'] = 'Daftar Snack';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0002"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0002", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/snack', $data);
        $this->viewPembeli('templates/footer');
    }

    public function minuman()
    {
        $data['judul'] = 'Daftar Minuman';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0003"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0003", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/minuman', $data);
        $this->viewPembeli('templates/footer');
    }

    public function obat()
    {
        $data['judul'] = 'Daftar Obat-Obatan';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0004"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0004", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/obat', $data);
        $this->viewPembeli('templates/footer');
    }

    public function pakaian()
    {
        $data['judul'] = 'Daftar Pakaian';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0005"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0005", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/pakaian', $data);
        $this->viewPembeli('templates/footer');
    }

    public function atk()
    {
        $data['judul'] = 'Daftar ATK';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0006"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0006", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/atk', $data);
        $this->viewPembeli('templates/footer');
    }

    public function perabotan()
    {
        $data['judul'] = 'Daftar Perabotan';
        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByKategori("K0007"));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0007", $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/perabotan', $data);
        $this->viewPembeli('templates/footer');
    }

    public function cariHarga()
    {
        $data['judul'] = 'Daftar Produk';

        if (isset($_POST['harga'])) {
            $_SESSION['minimum'] = $_POST['minimum'];
            $_SESSION['maksimum'] = $_POST['maksimum'];
            $_SESSION['hal'] = $_POST['hal'];
        }

        if (isset($_GET['halaman'])) {
            $halamanAktif = $_GET['halaman'];
        } else {
            $halamanAktif = 1;
        }
        $jumlahData = count($this->modelPenjual('Produk_model')->countProdukByHarga($_SESSION['minimum'], $_SESSION['maksimum'], $_SESSION['hal']));
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByHarga($_SESSION['minimum'], $_SESSION['maksimum'], $_SESSION['hal'], $halamanAktif, $this->jumlahDataPerHalaman);
        $data['jumlahHalaman'] = ceil($jumlahData / $this->jumlahDataPerHalaman);
        $data['halaman'] = $halamanAktif;
        $this->viewPembeli('templates/header', $data);
        switch ($_SESSION['hal']) {
            case 'K0001':
                $this->viewPembeli('produk/bahan_makanan', $data);
                break;
            case 'K0002':
                $this->viewPembeli('produk/snack', $data);
                break;
            case 'K0003':
                $this->viewPembeli('produk/minuman', $data);
                break;
            case 'K0004':
                $this->viewPembeli('produk/obat', $data);
                break;
            case 'K0005':
                $this->viewPembeli('produk/pakaian', $data);
                break;
            case 'K0006':
                $this->viewPembeli('produk/atk', $data);
                break;
            case 'K0007':
                $this->viewPembeli('produk/perabotan', $data);
                break;
            default:
                $this->viewPembeli('produk/index', $data);
                break;
        }
        $this->viewPembeli('templates/footer');
    }

    public function ubahDataBarang()
    {
        if ($this->modelPenjual('Produk_model')->updateDataBarang($_POST)) {
            Flasher::setFlash('Produk', 'berhasil', 'diubah', 'success');
            header('Location: ' . BASEURL . '/produk');
            exit;
        }
    }
}
