<?php

class Checkout_model
{

    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function orderBarang($data)
    {
        foreach ($data as $br) {
            $idTransaksi = $this->ambilProdukID();
            $tglPembelian = $this->tglPembelian($br['ProdukID']);

            var_dump($idTransaksi);
            var_dump($tglPembelian);
        }
    }

    public function ambilProdukID()
    {
        $query = "SELECT id_transaksi FROM " . $this->table . " ORDER BY id_transaksi DESC LIMIT 1";

        $this->db->query($query);
        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            $value2 = $row['id_transaksi'];
            $value2 = substr($value2, 2, 3);
            $value2 = (int) $value2 + 1;
            $value2 = "TR" . sprintf('%03s', $value2);
            $value = $value2;
            return $value;
        } else {
            $value2 = "TR001";
            $value = $value2;
            return $value;
        }
    }

    public function tglPembelian($id)
    {
        $query = "SELECT Tgl_Pembelian FROM produk WHERE ProdukID = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        return $this->db->single();
    }
}
