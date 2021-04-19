<?php

class User_model
{
    private $table = 'akun';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUser()
    {
        $userID = explode("/", $_GET['url']);
        $username = $userID[2];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE akun_id=:username');
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }

    public function detailUser()
    {
        $query = "SELECT * FROM " . $this->table . " WHERE akun_id=:username";
        $this->db->query($query);
        $this->db->bind('username', $_SESSION['user']['user'][0]['akun_id']);
        return $this->db->resultSet();
    }

    public function updateUser($data)
    {
        $query = "UPDATE " . $this->table . " SET nama=:nama, NoHp=:nohp, email=:email, alamat=:alamat WHERE akun_id=:username";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nohp', $data['NoHp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('username', $_SESSION['user']['user'][0]['akun_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }
}
