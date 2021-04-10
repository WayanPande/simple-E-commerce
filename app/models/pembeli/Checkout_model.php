<?php

class Checkout_model
{

    private $table = 'transaksi';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function orderBarang($data, $post)
    {
        foreach ($data as $br) {
            $idTransaksi = $this->ambilProdukID();
            $tglPembelian = $this->tglPembelian($br['ProdukID']);

            $query = "INSERT INTO transaksi
                        VALUES
                        (:idTransaksi,  CURRENT_TIMESTAMP, :TglPembelian, :ProdukID, :kuantitas, :harga, :akunID, :pengirimID)";

            $this->db->query($query);
            $this->db->bind('idTransaksi', $idTransaksi);
            $this->db->bind('TglPembelian', $tglPembelian['Tgl_Pembelian']);
            $this->db->bind('ProdukID', $br['ProdukID']);
            $this->db->bind('kuantitas', $br['kuantitas']);
            $this->db->bind('harga', $br['Harga']);
            $this->db->bind('akunID', $br['akun_id']);
            $this->db->bind('pengirimID', $post['pengirim']);

            $this->db->execute();
        }
        return $this->db->rowCount();
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

    public function hapusSemuaDataKeranjang($akun)
    {

        $query = "DELETE FROM keranjang WHERE akun_id = :akun";
        $this->db->query($query);
        $this->db->bind('akun', $akun);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateKuantitasBarang($data)
    {
        foreach ($data as $br) {
            $query = "UPDATE produk SET stok = (stok - :stok) WHERE ProdukID = :id";
            $this->db->query($query);
            $this->db->bind('stok', $br['kuantitas']);
            $this->db->bind('id', $br['ProdukID']);
            $this->db->execute();
        }
        return $this->db->rowCount();
    }
}
