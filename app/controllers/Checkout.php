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
        // var_dump($_POST);
        $keranjang = $this->modelPembeli('Keranjang_model')->queryAllKeranjang();

        if ($this->modelPembeli('Checkout_model')->orderBarang($keranjang, $_POST) > 0) {
            header('Location: ' . BASEURL . '/checkout');
            exit;
        } else {
            echo "
                <script>
                    alert('Order Gagal');
                </script>";
        }
    }

    public function inputOrder()
    {
        var_dump($_POST);
    }
}
