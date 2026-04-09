<?php

class Jurusan extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Jurusan';
        $data['jurusan'] = $this->model('JurusanModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('jurusan/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Jurusan';
        $data['errors'] = [];
        $data['old'] = [];

        $this->view('templates/header', $data);
        $this->view('jurusan/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $data = [
            'kd_jurusan' => trim($_POST['kd_jurusan'] ?? ''),
            'nm_jurusan' => trim($_POST['nm_jurusan'] ?? ''),
            'durasi'     => trim($_POST['durasi'] ?? ''),
            'biaya'      => trim($_POST['biaya'] ?? '')
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $viewData['title'] = 'Tambah Jurusan';
            $viewData['errors'] = $errors;
            $viewData['old'] = $data;

            $this->view('templates/header', $viewData);
            $this->view('jurusan/create', $viewData);
            $this->view('templates/footer');
            return;
        }

        $this->model('JurusanModel')->create($data);
        $this->redirect('jurusan');
    }

    public function edit($id)
    {
        $jurusan = $this->model('JurusanModel')->getById($id);

        if (!$jurusan) {
            $this->redirect('jurusan');
        }

        $data['title'] = 'Edit Jurusan';
        $data['jurusan'] = $jurusan;
        $data['errors'] = [];

        $this->view('templates/header', $data);
        $this->view('jurusan/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        $data = [
            'kd_jurusan' => $id,
            'nm_jurusan' => trim($_POST['nm_jurusan'] ?? ''),
            'durasi'     => trim($_POST['durasi'] ?? ''),
            'biaya'      => trim($_POST['biaya'] ?? '')
        ];

        $errors = $this->validate($data, false);

        if (!empty($errors)) {
            $viewData['title'] = 'Edit Jurusan';
            $viewData['jurusan'] = $data;
            $viewData['errors'] = $errors;

            $this->view('templates/header', $viewData);
            $this->view('jurusan/edit', $viewData);
            $this->view('templates/footer');
            return;
        }

        $this->model('JurusanModel')->update($data);
        $this->redirect('jurusan');
    }

    public function delete($id)
    {
        $this->model('JurusanModel')->delete($id);
        $this->redirect('jurusan');
    }

    private function validate($data, $checkCode = true)
    {
        $errors = [];

        if ($checkCode && $data['kd_jurusan'] === '') {
            $errors['kd_jurusan'] = 'Kode jurusan wajib diisi';
        }

        if ($data['nm_jurusan'] === '') {
            $errors['nm_jurusan'] = 'Nama jurusan wajib diisi';
        }

        if ($data['durasi'] === '') {
            $errors['durasi'] = 'Durasi wajib diisi';
        }

        if ($data['biaya'] === '' || !is_numeric($data['biaya'])) {
            $errors['biaya'] = 'Biaya wajib angka';
        }

        return $errors;
    }
}