<?php

class Login_model
{


    private $table = 'akun';
    private $db;
    private $stmt;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getUsername($username)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE username=:username');
        $this->db->bind('username', $username);
        return $this->db->resultSet();
    }

    public function autoAkunId()
    {
        $query = "SELECT akun_id FROM " . $this->table . " ORDER BY akun_id DESC LIMIT 1";

        $this->db->query($query);
        $row = $this->db->single();

        if ($this->db->rowCount() > 0) {
            $value2 = $row['akun_id'];
            $value2 = substr($value2, 3, 5);
            $value2 = (int) $value2 + 1;
            $value2 = "USR" . sprintf('%04s', $value2);
            $value = $value2;
            return $value;
        } else {
            $value2 = "USR0001";
            $value = $value2;
            return $value;
        }
    }

    public function tambahDataUser($data)
    {
        $id = $this->autoAkunId();
        $pass = password_hash($data['password'], PASSWORD_DEFAULT);
        $query = "INSERT INTO akun
                    VALUES
                (:akun_id, :nama, :NoHp, :email, :alamat, :Username, :password, :id_level)";

        $this->db->query($query);
        $this->db->bind('akun_id', $id);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('NoHp', $data['NoHp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('Username', $data['Username']);
        $this->db->bind('password', $pass);
        $this->db->bind('id_level', $data['id_level']);

        $this->db->execute();

        return $this->db->rowCount();
    }
}
