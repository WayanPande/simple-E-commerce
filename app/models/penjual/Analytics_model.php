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

    public function getRataRata($cek)
    {
        if ($cek == 1) {
            $query = "SELECT ProdukID, AVG(Kuantitas) AS rata_rata FROM transaksi GROUP BY ProdukID";
        } else {
            $query = "SELECT ProdukID, AVG(Kuantitas) AS rata_rata FROM transaksi GROUP BY ProdukID LIMIT 5";
        }
        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function cariDataProdukTgl($data, $id)
    {
        $min = $data['minimum'];
        $max = $data['maksimum'];

        if ($min == '' && $max == '') {
            $min = "0000-00-00";
            $max = date("Y-m-d", strtotime(date("Y-m-d") . ' +1 day'));
        } elseif ($min == '') {
            $min = "0000-00-00";
            $max = date("Y-m-d", strtotime($max . ' +1 day'));
        } elseif ($max == '') {
            $max = date("Y-m-d", strtotime(date("Y-m-d") . ' +1 day'));
        } else {
            $max = date("Y-m-d", strtotime($max . ' +1 day'));
        }

        $query = "SELECT id_transaksi, DATE(Tgl_Penjualan) AS tanggal, TIME(Tgl_Penjualan) AS jam, TotalHarga, produk.ProdukID, produk.Nama_Produk, kuantitas 
        FROM transaksi INNER JOIN produk 
        ON transaksi.ProdukID = produk.ProdukID 
        WHERE produk.PenjualID = :id AND transaksi.Tgl_Penjualan BETWEEN :min AND :max";
        $this->db->query($query);
        $this->db->bind('min', $min);
        $this->db->bind('max', $max);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function cariDataProduk($data, $id)
    {
        $query = "SELECT id_transaksi, DATE(Tgl_Penjualan) AS tanggal, TIME(Tgl_Penjualan) AS jam, TotalHarga, produk.ProdukID, produk.Nama_Produk, kuantitas 
        FROM transaksi AS t INNER JOIN produk 
        ON t.ProdukID = produk.ProdukID 
        WHERE produk.PenjualID = :id AND t.id_transaksi LIKE '%$data%' OR t.Tgl_Penjualan LIKE '%$data%' OR t.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR t.kuantitas LIKE '%$data%'";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }
}
