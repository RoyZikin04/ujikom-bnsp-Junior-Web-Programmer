<?php

class Peserta extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Peserta';
        $data['peserta'] = $this->model('PesertaModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('peserta/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Peserta';
        $data['errors'] = [];
        $data['old'] = [];
        $data['jurusan'] = $this->model('JurusanModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('peserta/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'kd_jurusan' => trim($_POST['kd_jurusan'] ?? ''),
            'nm_peserta' => trim($_POST['nm_peserta'] ?? ''),
            'jekel'      => trim($_POST['jekel'] ?? ''),
            'alamat'     => trim($_POST['alamat'] ?? ''),
            'no_hp'      => trim($_POST['no_hp'] ?? '')
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $viewData['title'] = 'Tambah Peserta';
            $viewData['errors'] = $errors;
            $viewData['old'] = $data;
            $viewData['jurusan'] = $this->model('JurusanModel')->getAll();

            $this->view('templates/header', $viewData);
            $this->view('peserta/create', $viewData);
            $this->view('templates/footer');
            return;
        }

        $this->model('PesertaModel')->create($data);
        $this->redirect('peserta');
    }

    public function edit($id)
    {
        $peserta = $this->model('PesertaModel')->getById($id);

        if (!$peserta) {
            $this->redirect('peserta');
        }

        $data['title'] = 'Edit Peserta';
        $data['peserta'] = $peserta;
        $data['errors'] = [];
        $data['jurusan'] = $this->model('JurusanModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('peserta/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'id_peserta' => $id,
            'kd_jurusan' => trim($_POST['kd_jurusan'] ?? ''),
            'nm_peserta' => trim($_POST['nm_peserta'] ?? ''),
            'jekel'      => trim($_POST['jekel'] ?? ''),
            'alamat'     => trim($_POST['alamat'] ?? ''),
            'no_hp'      => trim($_POST['no_hp'] ?? '')
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $viewData['title'] = 'Edit Peserta';
            $viewData['peserta'] = $data;
            $viewData['errors'] = $errors;
            $viewData['jurusan'] = $this->model('JurusanModel')->getAll();

            $this->view('templates/header', $viewData);
            $this->view('peserta/edit', $viewData);
            $this->view('templates/footer');
            return;
        }

        $this->model('PesertaModel')->update($data);
        $this->redirect('peserta');
    }

    public function delete($id)
    {
        $this->model('PesertaModel')->delete($id);
        $this->redirect('peserta');
    }

    private function validate($data)
    {
        $errors = [];

        if ($data['kd_jurusan'] === '') {
            $errors['kd_jurusan'] = 'Jurusan wajib dipilih';
        } elseif (!$this->model('JurusanModel')->getById($data['kd_jurusan'])) {
            $errors['kd_jurusan'] = 'Jurusan tidak ditemukan';
        }

        if ($data['nm_peserta'] === '') {
            $errors['nm_peserta'] = 'Nama peserta wajib diisi';
        }

        if (!in_array($data['jekel'], ['L', 'P'])) {
            $errors['jekel'] = 'Jenis kelamin wajib dipilih';
        }

        if ($data['alamat'] === '') {
            $errors['alamat'] = 'Alamat wajib diisi';
        }

        if ($data['no_hp'] === '') {
            $errors['no_hp'] = 'No HP wajib diisi';
        }

        return $errors;
    }
}