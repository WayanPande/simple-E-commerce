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

    public function countAllProdukHome()
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' LIMIT 12');

        return $this->db->resultSet();
    }

    public function countAllProduk()
    {
        $this->db->query('SELECT * FROM ' . $this->table);

        return $this->db->resultSet();
    }

    public function getAllProdukPembeli($halamanAktif, $jumlahDataPerHalaman)
    {
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
        $query = "SELECT * FROM " . $this->table . " LIMIT :awal, :akhir";
        $this->db->query($query);
        $this->db->bind('awal', $awalData);
        $this->db->bind('akhir', $jumlahDataPerHalaman);

        return $this->db->resultSet();
    }

    public function tambahDataProduk($data)
    {
        $produkid = $this->ambilProdukID();
        $penjualid =  $_SESSION['user']['user'][0]['akun_id'];
        $query = "INSERT INTO produk
                    VALUES
                (:produkid, :nama, :stok, :id_kategori, :hargaJual, :hargaBeli, :penjualid, CURRENT_TIMESTAMP)";

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

    public function cariDataProduk($data, $halamanAktif, $jumlahDataPerHalaman, $kategori)
    {
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

        if ($kategori == "all") {
            $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE produk.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR produk.Stok LIKE '%$data%' OR kategori.Nama_Kategori LIKE '%$data%' OR produk.Harga_Jual LIKE '%$data%' OR produk.Harga_Beli LIKE '%$data%' LIMIT :awal, :akhir";

            $this->db->query($query);
        } else {
            $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE (produk.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR produk.Stok LIKE '%$data%' OR kategori.Nama_Kategori LIKE '%$data%' OR produk.Harga_Jual LIKE '%$data%' OR produk.Harga_Beli LIKE '%$data%') AND kategori.KategoriID = :kategori LIMIT :awal, :akhir";


            $this->db->query($query);
            $this->db->bind('kategori', $kategori);
        }

        $this->db->bind('awal', $awalData);
        $this->db->bind('akhir', $jumlahDataPerHalaman);
        return $this->db->resultSet();
    }

    public function countCariDataProduk($data, $kategori)
    {

        if ($kategori == "all") {
            $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE produk.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR produk.Stok LIKE '%$data%' OR kategori.Nama_Kategori LIKE '%$data%' OR produk.Harga_Jual LIKE '%$data%' OR produk.Harga_Beli LIKE '%$data%'";

            $this->db->query($query);
        } else {
            $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE (produk.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR produk.Stok LIKE '%$data%' OR kategori.Nama_Kategori LIKE '%$data%' OR produk.Harga_Jual LIKE '%$data%' OR produk.Harga_Beli LIKE '%$data%') AND kategori.KategoriID = :kategori";

            $this->db->query($query);
            $this->db->bind('kategori', $kategori);
        }


        return $this->db->resultSet();
    }

    public function getAllOrder()
    {
        $query = "SELECT id_transaksi, DATE(Tgl_Penjualan) AS tanggal, TIME(Tgl_Penjualan) AS jam, TotalHarga FROM transaksi INNER JOIN produk ON transaksi.ProdukID = produk.ProdukID WHERE produk.PenjualID = :id ORDER BY tanggal DESC LIMIT 6";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }

    public function getJumlahOrder()
    {
        $query = "SELECT COUNT(transaksi.ProdukID) AS jumlah,  (SUM(transaksi.TotalHarga) - SUM(transaksi.kuantitas*produk.Harga_Beli)) AS pendapatan FROM transaksi
        INNER JOIN produk ON transaksi.ProdukID = produk.ProdukID
        WHERE produk.PenjualID = :id ";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }

    public function getPendapatanHariIni()
    {
        $query = "CALL pendapatan_hari_ini(:id)";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->single();
    }

    public function countProdukByKategori($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE KategoriID=:id";
        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function getProdukByKategori($id, $halamanAktif, $jumlahDataPerHalaman)
    {
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;
        $query = "SELECT * FROM " . $this->table . " WHERE KategoriID=:id LIMIT :awal, :akhir";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->bind('awal', $awalData);
        $this->db->bind('akhir', $jumlahDataPerHalaman);

        return $this->db->resultSet();
    }

    public function countProdukByHarga($min, $max, $kategori)
    {

        if ($min == '' && $max == '') {
            $min = "0";
            $max = "999999999";
        } elseif ($min == '') {
            $min = "0";
        } elseif ($max == '') {
            $max = "999999999";
        }


        if ($kategori == "all") {
            $query = "SELECT * FROM " . $this->table . " WHERE Harga_Jual BETWEEN :min AND :max";
            $this->db->query($query);
            $this->db->bind('min', $min);
            $this->db->bind('max', $max);
        } else {
            $query = "SELECT * FROM " . $this->table . " WHERE KategoriID=:kategori AND Harga_Jual BETWEEN :min AND :max";
            $this->db->query($query);
            $this->db->bind('min', $min);
            $this->db->bind('max', $max);
            $this->db->bind('kategori', $kategori);
        }

        return $this->db->resultSet();
    }

    public function getProdukByHarga($min, $max, $kategori, $halamanAktif, $jumlahDataPerHalaman)
    {
        $awalData = ($jumlahDataPerHalaman * $halamanAktif) - $jumlahDataPerHalaman;

        if ($min == '' && $max == '') {
            $min = "0";
            $max = "999999999";
        } elseif ($min == '') {
            $min = "0";
        } elseif ($max == '') {
            $max = "999999999";
        }


        if ($kategori == "all") {
            $query = "SELECT * FROM " . $this->table . " WHERE Harga_Jual BETWEEN :min AND :max LIMIT :awal, :akhir";
            $this->db->query($query);
            $this->db->bind('min', $min);
            $this->db->bind('max', $max);
            $this->db->bind('awal', $awalData);
            $this->db->bind('akhir', $jumlahDataPerHalaman);
        } else {
            $query = "SELECT * FROM " . $this->table . " WHERE KategoriID=:kategori AND Harga_Jual BETWEEN :min AND :max LIMIT :awal, :akhir";
            $this->db->query($query);
            $this->db->bind('min', $min);
            $this->db->bind('max', $max);
            $this->db->bind('kategori', $kategori);
            $this->db->bind('awal', $awalData);
            $this->db->bind('akhir', $jumlahDataPerHalaman);
        }

        return $this->db->resultSet();
    }

    public function updateDataBarang($data)
    {

        $query = "UPDATE " . $this->table . " SET Nama_Produk=:nama, Stok=:stok, Harga_Jual=:harga WHERE ProdukID=:id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('stok', (int)$data['stok']);
        $this->db->bind('harga', (int)$data['harga']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataProdukPenjual($data, $id)
    {

        $query = "SELECT produk.ProdukID, produk.Nama_Produk, produk.Stok,kategori.Nama_Kategori, produk.Harga_Jual, produk.Harga_Beli FROM produk INNER JOIN kategori ON produk.KategoriID = kategori.KategoriID WHERE (produk.ProdukID LIKE '%$data%' OR produk.Nama_Produk LIKE '%$data%' OR produk.Stok LIKE '%$data%' OR kategori.Nama_Kategori LIKE '%$data%' OR produk.Harga_Jual LIKE '%$data%' OR produk.Harga_Beli LIKE '%$data%') AND produk.PenjualID=:id";

        $this->db->query($query);
        $this->db->bind('id', $id);

        return $this->db->resultSet();
    }

    public function produkTerlaris()
    {
        $query = "SELECT produk.Nama_Produk, SUM(kuantitas) AS kuantitas 
        FROM transaksi INNER JOIN produk 
        ON transaksi.ProdukID = produk.ProdukID 
        WHERE produk.PenjualID = :id 
        GROUP BY produk.Nama_Produk
        ORDER BY kuantitas DESC LIMIT 3";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }

    public function stokProduk()
    {
        $query = "SELECT Nama_Produk, Stok 
        FROM produk WHERE PenjualID = :id
        HAVING Stok < 11
        ORDER BY Stok LIMIT 3";
        $this->db->query($query);
        $this->db->bind('id', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }
}
