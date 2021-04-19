<?php

class About extends Controller
{

    public function index()
    {
        $data['judul'] = 'About';
        $data['akun'] = $this->modelPenjual('User_model')->detailUser();
        // var_dump($data['akun']);

        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('about/index', $data);
        $this->viewPenjual('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'Page';

        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('about/page');
        $this->viewPenjual('templates/footer');
    }

    public function update()
    {
        // var_dump($_POST);
        if ($this->modelPenjual('User_model')->updateUser($_POST) > 0) {

            Flasher::setFlash('Profile', 'berhasil', 'diupdate', 'success');
            header('Location: ' . BASEURL . '/about');
            exit;
        } else {
            Flasher::setFlash('Profile', 'gagal', 'diupdate', 'danger');
            header('Location: ' . BASEURL . '/about');
            exit;
        }
    }
}
