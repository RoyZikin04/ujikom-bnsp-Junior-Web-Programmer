<?php

class Pendaftaran extends Controller
{
    public function index()
    {
        $data['title'] = 'Data Pendaftaran';
        $data['pendaftaran'] = $this->model('PendaftaranModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('pendaftaran/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        $data['title'] = 'Tambah Pendaftaran';
        $data['errors'] = [];
        $data['old'] = [];
        $data['peserta'] = $this->model('PesertaModel')->getAll();
        $data['jurusan'] = $this->model('JurusanModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('pendaftaran/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        $id_peserta = trim($_POST['id_peserta'] ?? '');
        $tgl_daftar = trim($_POST['tgl_daftar'] ?? '');
        $status     = trim($_POST['status'] ?? '');

        $peserta = null;
        if ($id_peserta !== '') {
            $peserta = $this->model('PesertaModel')->getById($id_peserta);
        }

        $data = [
            'id_peserta' => $id_peserta,
            'kd_jurusan' => $peserta['kd_jurusan'] ?? '',
            'tgl_daftar' => $tgl_daftar,
            'status'     => $status
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $viewData['title'] = 'Tambah Pendaftaran';
            $viewData['errors'] = $errors;
            $viewData['old'] = $data;
            $viewData['peserta'] = $this->model('PesertaModel')->getAll();
            $viewData['jurusan'] = $this->model('JurusanModel')->getAll();

            $this->view('templates/header', $viewData);
            $this->view('pendaftaran/create', $viewData);
            $this->view('templates/footer');
            return;
        }

        $this->model('PendaftaranModel')->create($data);
        $this->redirect('pendaftaran');
    }

    public function edit($id)
    {
        $pendaftaran = $this->model('PendaftaranModel')->getById($id);

        if (!$pendaftaran) {
            $this->redirect('pendaftaran');
            return;
        }

        $data['title'] = 'Edit Pendaftaran';
        $data['pendaftaran'] = $pendaftaran;
        $data['errors'] = [];
        $data['peserta'] = $this->model('PesertaModel')->getAll();
        $data['jurusan'] = $this->model('JurusanModel')->getAll();

        $this->view('templates/header', $data);
        $this->view('pendaftaran/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        $id_peserta = trim($_POST['id_peserta'] ?? '');
        $tgl_daftar = trim($_POST['tgl_daftar'] ?? '');
        $status     = trim($_POST['status'] ?? '');

        $peserta = null;
        if ($id_peserta !== '') {
            $peserta = $this->model('PesertaModel')->getById($id_peserta);
        }

        $data = [
            'id_daftar'  => $id,
            'id_peserta' => $id_peserta,
            'kd_jurusan' => $peserta['kd_jurusan'] ?? '',
            'tgl_daftar' => $tgl_daftar,
            'status'     => $status
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $viewData['title'] = 'Edit Pendaftaran';
            $viewData['pendaftaran'] = $data;
            $viewData['errors'] = $errors;
            $viewData['peserta'] = $this->model('PesertaModel')->getAll();
            $viewData['jurusan'] = $this->model('JurusanModel')->getAll();

            $this->view('templates/header', $viewData);
            $this->view('pendaftaran/edit', $viewData);
            $this->view('templates/footer');
            return;
        }

        $this->model('PendaftaranModel')->update($data);
        $this->redirect('pendaftaran');
    }

    public function status($id)
    {
        $status = trim($_POST['status'] ?? 'Aktif');

        if (!in_array($status, ['Aktif', 'Selesai', 'Batal'])) {
            $status = 'Aktif';
        }

        $this->model('PendaftaranModel')->updateStatus($id, $status);
        $this->redirect('pendaftaran');
    }

    public function delete($id)
    {
        $this->model('PendaftaranModel')->delete($id);
        $this->redirect('pendaftaran');
    }

    private function validate($data)
    {
        $errors = [];

        if ($data['id_peserta'] === '') {
            $errors['id_peserta'] = 'Peserta wajib dipilih';
        } elseif (!$this->model('PesertaModel')->getById($data['id_peserta'])) {
            $errors['id_peserta'] = 'Peserta tidak valid';
        }

        if ($data['kd_jurusan'] === '') {
            $errors['kd_jurusan'] = 'Jurusan peserta tidak ditemukan';
        } elseif (!$this->model('JurusanModel')->getById($data['kd_jurusan'])) {
            $errors['kd_jurusan'] = 'Jurusan tidak valid';
        }

        if ($data['tgl_daftar'] === '') {
            $errors['tgl_daftar'] = 'Tanggal daftar wajib diisi';
        }

        if (!in_array($data['status'], ['Aktif', 'Selesai', 'Batal'])) {
            $errors['status'] = 'Status tidak valid';
        }

        return $errors;
    }
}