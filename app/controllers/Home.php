<?php

class Home extends Controller
{
    public function indexPenjual()
    {
        $data['judul'] = 'Home';
        $data['transaksi'] = $this->modelPenjual('Produk_model')->getAllOrder();
        $data['jumlah_order'] = $this->modelPenjual('Produk_model')->getJumlahOrder();
        $data['terlaris'] = $this->modelPenjual('Produk_model')->produkTerlaris();
        $data['stok'] = $this->modelPenjual('Produk_model')->stokProduk();
        $data['pendapatan'] = $this->modelPenjual('Produk_model')->getPendapatanHariIni();
        if ($data['pendapatan']['pendapatan'] == null) {
            $data['pendapatan']['pendapatan'] = 0;
        }
        if ($data['stok'] == null && $data['terlaris'] == null) {
            $data['random'][1] = 0;
            $data['random'][2] = 0;
            $data['random'][3] = 0;
        } else {
            $data['random'][1] = rand(1, 50);
            $data['random'][2] = rand(1, 50);
            $data['random'][3] = rand(1, 50);
        }
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('home/index', $data);
        $this->viewPenjual('templates/footer');
    }

    public function indexPembeli()
    {
        $data['judul'] = 'Home';
        // $data['nama'] = $this->model('User_model')->getUser();
        $_SESSION['keranjang'] = $this->modelPembeli('Keranjang_model')->totalBarang();
        $data['produk'] = $this->modelPenjual('Produk_model')->countAllProdukHome();
        // var_dump($data['produk']);
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('home/index', $data);
        $this->viewPembeli('templates/footer');
    }
}
