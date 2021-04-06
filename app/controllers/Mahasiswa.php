<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->modelPenjual('Mahasiswa_model')->getAllMahasiswa();
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('mahasiswa/index', $data);
        $this->viewPenjual('templates/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->modelPenjual('Mahasiswa_model')->getMahasiswaById($id);
        $this->viewPenjual('templates/header', $data);
        $this->viewPenjual('mahasiswa/detail', $data);
        $this->viewPenjual('templates/footer');
    }

    public function tambah()
    {
        if ($this->modelPenjual('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {

            Flasher::setFlash('berhasil', 'ditambahkan', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'ditambahkan', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->modelPenjual('Mahasiswa_model')->hapusDataMahasiswa($id) > 0) {

            Flasher::setFlash('berhasil', 'dihapus', 'success');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        } else {
            Flasher::setFlash('gagal', 'dihapus', 'danger');
            header('Location: ' . BASEURL . '/mahasiswa');
            exit;
        }
    }

    public function getubah()
    {
        echo 'ok';
        //echo json_encode($this->model('Mahasiswa_model')->getMahasiswaById($_POST['id']));
    }
}
