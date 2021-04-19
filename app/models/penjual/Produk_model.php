<?php

class Produk_model
{

    private $table = 'produk';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }


    public function getAllProduk()
    {
        $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE PenjualID=:id";
        // $this->db->query('SELECT * FROM ' . $this->table . ' WHERE PenjualID=:id');
        $this->db->query($query);

        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }

    public function getAllProdukPembeli()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function tambahDataProduk($data)
    {
        $produkid = $this->ambilProdukID();
        $penjualid =  $_SESSION['user']['user'][0]['akun_id'];
        $query = "INSERT INTO produk
                    VALUES
                (:produkid, :nama, :stok, :id_kategori, :hargaJual, :hargaBeli, :penjualid, CURRENT_TIMESTAMP)";
        // $query = "INSERT INTO produk
        //             VALUES
        //         ('PR005', 'Teh', '23', 'K0003', '2000', '1000', 'USR0005')";

        $this->db->query($query);
        $this->db->bind('produkid', $produkid);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stok', $data['stok']);
        $this->db->bind('id_kategori', $data['id_kategori']);
        $this->db->bind('hargaJual', $data['hargaJual']);
        $this->db->bind('hargaBeli', $data['hargaBeli']);
        $this->db->bind('penjualid', $penjualid);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function ambilProdukID()
    {
        $query = "SELECT ProdukID FROM " . $this->table . " ORDER BY ProdukID DESC LIMIT 1";

        $this->db->query($query);
        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            $value2 = $row['ProdukID'];
            $value2 = substr($value2, 2, 3);
            $value2 = (int) $value2 + 1;
            $value2 = "PR" . sprintf('%03s', $value2);
            $value = $value2;
            return $value;
        } else {
            $value2 = "USR0001";
            $value = $value2;
            return $value;
        }
    }

    public function hapusDataProduk($id)
    {
        $query = "DELETE FROM " . $this->table . " WHERE ProdukID = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataProduk($data)
    {
        $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE produk.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR produk.Stok LIKE '%$data%' OR kategori.Nama_Kategori LIKE '%$data%' OR produk.Harga_Jual LIKE '%$data%' OR produk.Harga_Beli LIKE '%$data%'";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getAllOrder()
    {
        $query = "SELECT id_transaksi, DATE(Tgl_Penjualan) AS tanggal, TIME(Tgl_Penjualan) AS jam, TotalHarga FROM transaksi INNER JOIN produk ON transaksi.ProdukID = produk.ProdukID WHERE produk.PenjualID = :id ORDER BY tanggal DESC LIMIT 10";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }

    public function getJumlahOrder()
    {
        $query = "SELECT COUNT(transaksi.ProdukID) AS jumlah,  SUM(transaksi.TotalHarga) AS pendapatan FROM transaksi
        INNER JOIN produk ON transaksi.ProdukID = produk.ProdukID
        WHERE produk.PenjualID = :id ";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }
}
