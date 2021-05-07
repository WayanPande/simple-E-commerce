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

    public function ratarata()
    {
        $data['judul'] = 'Rata-Rata';
        $data['ratarata'] = $this->modelPenjual('Analytics_model')->getRataRata();
        $index = 0;
        foreach ($data['ratarata'] as $i) {
            $temp = (float)$i['rata_rata'];
            $data['ratarata'][$index]['rata_rata'] = round($temp);
            $index++;
        }
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('analytics/ratarata', $data);
        $this->viewPenjual('templates/footer');
    }
}
