<?php

class Analytics_model
{

    private $table = 'produk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllOrder()
    {
        $query = "SELECT id_transaksi, DATE(Tgl_Penjualan) AS tanggal, TIME(Tgl_Penjualan) AS jam, TotalHarga, produk.ProdukID, produk.Nama_Produk, kuantitas 
        FROM transaksi INNER JOIN produk 
        ON transaksi.ProdukID = produk.ProdukID 
        WHERE produk.PenjualID = :id
        ORDER BY tanggal DESC LIMIT 10";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }
}
