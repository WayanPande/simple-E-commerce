<?php

class Home extends Controller
{
    public function indexPenjual()
    {
        $data['judul'] = 'Home';
        $data['transaksi'] = $this->modelPenjual('Produk_model')->getAllOrder();
        $data['jumlah_order'] = $this->modelPenjual('Produk_model')->getJumlahOrder();
        // var_dump($data['transaksi']);
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('home/index', $data);
        $this->viewPenjual('templates/footer');
    }

    public function indexPembeli()
    {
        $data['judul'] = 'Home';
        // $data['nama'] = $this->model('User_model')->getUser();
        $_SESSION['keranjang'] = $this->modelPembeli('Keranjang_model')->totalBarang();
        $data['produk'] = $this->modelPenjual('Produk_model')->getAllProdukPembeli();
        // var_dump($data['produk']);
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('home/index', $data);
        $this->viewPembeli('templates/footer');
    }
}
