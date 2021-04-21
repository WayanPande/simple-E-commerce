<?php

class Produk extends Controller
{
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
        $data['produk'] = $this->modelPenjual('Produk_model')->getAllProdukPembeli();
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
        $data['produk'] = $this->modelPenjual('Produk_model')->cariDataProduk($_POST['keyword']);
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/index', $data);
        $this->viewPembeli('templates/footer');
    }

    public function keranjang($id)
    {

        if ($this->modelPembeli('Keranjang_model')->tambah($id, $_POST['jumlah']) > 0) {

            $_SESSION['keranjang'] = $this->modelPembeli('Keranjang_model')->totalBarang();
            Flasher::setFlash('Produk', 'berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/produk/indexPembeli');
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

    public function bahan_makanan()
    {
        $data['judul'] = 'Daftar Bahan Makanan';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0001");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/bahan_makanan', $data);
        $this->viewPembeli('templates/footer');
    }

    public function snack()
    {
        $data['judul'] = 'Daftar Snack';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0002");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/snack', $data);
        $this->viewPembeli('templates/footer');
    }

    public function minuman()
    {
        $data['judul'] = 'Daftar Minuman';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0003");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/minuman', $data);
        $this->viewPembeli('templates/footer');
    }

    public function obat()
    {
        $data['judul'] = 'Daftar Obat-Obatan';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0004");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/obat', $data);
        $this->viewPembeli('templates/footer');
    }

    public function pakaian()
    {
        $data['judul'] = 'Daftar Pakaian';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0005");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/pakaian', $data);
        $this->viewPembeli('templates/footer');
    }

    public function atk()
    {
        $data['judul'] = 'Daftar ATK';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0006");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/atk', $data);
        $this->viewPembeli('templates/footer');
    }

    public function perabotan()
    {
        $data['judul'] = 'Daftar Perabotan';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByKategori("K0007");
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('produk/perabotan', $data);
        $this->viewPembeli('templates/footer');
    }

    public function cariHarga()
    {
        $data['judul'] = 'Daftar Produk';
        $data['produk'] = $this->modelPenjual('Produk_model')->getProdukByHarga($_POST['minimum'], $_POST['maksimum'], $_POST['hal']);
        // var_dump($_POST);
        $this->viewPembeli('templates/header', $data);
        switch ($_POST['hal']) {
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
}
