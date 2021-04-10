<?php

class Keranjang_model
{

    private $table = 'keranjang';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function tambah($data, $jumlah)
    {
        $akun = $_SESSION['user']['user'][0]['akun_id'];
        $dataProduk = $this->cariDataProduk($data);
        $jumlah = (int) $jumlah;
        $harga = $jumlah *  $dataProduk[0]['Harga_Jual'];

        $query = "INSERT INTO keranjang
                    VALUES
                (:produkid, :nama, :harga, :akunID, :jumlah)";


        $this->db->query($query);
        $this->db->bind('produkid', $data);
        $this->db->bind('nama', $dataProduk[0]['Nama_Produk']);
        $this->db->bind('harga', $harga);
        $this->db->bind('akunID', $akun);
        $this->db->bind('jumlah', $jumlah);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataProduk($data)
    {
        $query = "SELECT * FROM produk WHERE ProdukID = :id";

        $this->db->query($query);
        $this->db->bind('id', $data);
        return $this->db->resultSet();
    }

    public function totalBarang()
    {
        $akun = $_SESSION['user']['user'][0]['akun_id'];
        $query = "SELECT COUNT(akun_id) AS total FROM " . $this->table . " WHERE akun_id = '" . $akun . "'";
        $this->db->query($query);
        return $this->db->single();
    }

    public function totalHargaBarang()
    {
        $akun = $_SESSION['user']['user'][0]['akun_id'];
        $query = "SELECT SUM(Harga) AS totalHarga FROM " . $this->table . " WHERE akun_id = '" . $akun . "'";
        $this->db->query($query);
        return $this->db->single();
    }

    public function queryAllKeranjang()
    {
        $akun = $_SESSION['user']['user'][0]['akun_id'];
        $query = "SELECT * FROM " . $this->table . " WHERE akun_id = '" . $akun . "'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function hapusDataKeranjang($id, $akun)
    {
        $query = "DELETE FROM " . $this->table . " WHERE ProdukID = :id AND akun_id = :akun";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('akun', $akun);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
