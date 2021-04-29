<?php

class Analytics extends Controller
{

    public function index()
    {
        $data['judul'] = 'Analytics';
        $data['order'] = $this->modelPenjual('Analytics_model')->getAllOrder();
        // var_dump($data['order']);
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('analytics/index', $data);
        $this->viewPenjual('templates/footer');
    }

    public function cari()
    {
    }
}
