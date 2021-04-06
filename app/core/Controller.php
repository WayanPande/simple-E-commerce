<?php

class Controller
{
    public function viewPenjual($view, $data = [])
    {
        require_once '../app/views/penjual/' . $view . '.php';
    }

    public function view($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }

    public function viewPembeli($view, $data = [])
    {
        require_once '../app/views/pembeli/' . $view . '.php';
    }

    public function modelPenjual($model)
    {
        require_once '../app/models/penjual/' . $model . '.php';
        return new $model;
    }

    public function modelPembeli($model)
    {
        require_once '../app/models/pembeli/' . $model . '.php';
        return new $model;
    }
}
