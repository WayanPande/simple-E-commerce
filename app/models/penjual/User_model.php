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
}
