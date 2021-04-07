<?php

class Checkout extends Controller
{
    public function index()
    {
        $data['judul'] = 'Checkout';
        $data['keranjang'] = $this->modelPembeli('Keranjang_model')->queryAllKeranjang();
        $data['total'] = $this->modelPembeli('Keranjang_model')->totalHargaBarang();
        $this->viewPembeli('templates/header', $data);
        $this->viewPembeli('checkout/index', $data);
        $this->viewPembeli('templates/footer');
    }

    public function order()
    {
        $keranjang = $this->modelPembeli('Keranjang_model')->queryAllKeranjang();
        $this->modelPembeli('Checkout_model')->orderBarang($keranjang);
    }

    public function inputOrder()
    {
        var_dump($_POST);
    }
}
