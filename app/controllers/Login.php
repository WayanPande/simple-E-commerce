<?php


class Login extends Controller
{
    public function index()
    {
        $data['judul'] = 'Login';
        if ($_POST != null) {
            $data['user'] = $this->modelPenjual('Login_model')->getUsername($_POST['username']);
        }

        $_SESSION["user"] = $data;

        $this->view('login/index', $data);
    }

    public function tambah()
    {
        if ($this->modelPenjual('Login_model')->tambahDataUser($_POST) > 0) {
            header('Location: ' . BASEURL);
            exit;
        }
        // var_dump($_POST);
    }
}
