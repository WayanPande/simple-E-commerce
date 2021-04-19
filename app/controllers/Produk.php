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

    public function indexPembeli()
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
}
