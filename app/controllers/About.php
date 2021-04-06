<?php

class About extends Controller
{

    public function index($nama = "Lojik", $pekerjaan = "wadidwa", $umur = 12)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About';

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
}
