<?php

class Home extends Controller
{
    public function index()
    {
        $keyword = $_GET['keyword'] ?? null;

        $pesertaModel = $this->model('PesertaModel');
        $jurusanModel = $this->model('JurusanModel');
        $pendaftaranModel = $this->model('PendaftaranModel');

        $data['title'] = 'Home';
        $data['keyword'] = $keyword;
        $data['peserta'] = $pesertaModel->getAll($keyword);

        $data['totalPeserta'] = $pesertaModel->countAll();
        $data['totalJurusan'] = $jurusanModel->countAll();
        $data['totalPendaftaran'] = $pendaftaranModel->countAll();
        $data['totalAktif'] = $pendaftaranModel->countByStatus('Aktif');
        $data['totalSelesai'] = $pendaftaranModel->countByStatus('Selesai');
        $data['totalBatal'] = $pendaftaranModel->countByStatus('Batal');
        $data['recentPendaftaran'] = $pendaftaranModel->getRecent(5);

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}