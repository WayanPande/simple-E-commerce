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
        // var_dump($keranjang);
        if ($this->modelPembeli('Checkout_model')->orderBarang($keranjang, $_POST) > 0) {
            $this->modelPembeli('Checkout_model')->updateKuantitasBarang($keranjang);
            $this->modelPembeli('Checkout_model')->hapusSemuaDataKeranjang($keranjang[0]['akun_id']);
            $_SESSION['keranjang'] = $this->modelPembeli('Keranjang_model')->totalBarang();
            header('Location: ' . BASEURL . '/checkout');
            exit;
        } else {
            echo "
                <script>
                    alert('Order Gagal');
                </script>";
        }
    }
}
