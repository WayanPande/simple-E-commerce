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
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE PenjualID=:id');
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
        $query = "SELECT * FROM " . $this->table . " WHERE ProdukID LIKE '%$data%' OR Nama_Produk LIKE '%$data%' OR Stok LIKE '%$data%' OR KategoriID LIKE '%$data%' OR Harga_Jual LIKE '%$data%' OR Harga_Beli LIKE '%$data%'";

        $this->db->query($query);
        return $this->db->resultSet();
    }
}
