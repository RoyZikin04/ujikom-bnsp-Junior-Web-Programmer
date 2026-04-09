<div class="page-heading">
    <div class="page-title">Home</div>
    <p class="page-subtitle">Statistik dan data peserta kursus.</p>
</div>

<div class="row g-3 mb-4">
    <div class="col-md-4 col-lg-2">
        <div class="stat-card primary">
            <div class="stat-label">Peserta</div>
            <div class="stat-value"><?= $data['totalPeserta']; ?></div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="stat-card primary">
            <div class="stat-label">Jurusan</div>
            <div class="stat-value"><?= $data['totalJurusan']; ?></div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="stat-card warning">
            <div class="stat-label">Pendaftaran</div>
            <div class="stat-value"><?= $data['totalPendaftaran']; ?></div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="stat-card success">
            <div class="stat-label">Aktif</div>
            <div class="stat-value"><?= $data['totalAktif']; ?></div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="stat-card primary">
            <div class="stat-label">Selesai</div>
            <div class="stat-value"><?= $data['totalSelesai']; ?></div>
        </div>
    </div>
    <div class="col-md-4 col-lg-2">
        <div class="stat-card danger">
            <div class="stat-label">Batal</div>
            <div class="stat-value"><?= $data['totalBatal']; ?></div>
        </div>
    </div>
</div>

<div class="soft-card mb-4">
    <div class="card-header">Pencarian Peserta</div>
    <div class="card-body">
        <form action="<?= BASEURL; ?>" method="GET" class="row g-2">
            <div class="col-md-10">
                <input 
                    type="text" 
                    name="keyword" 
                    class="form-control" 
                    placeholder="Cari nama peserta..." 
                    value="<?= htmlspecialchars($data['keyword'] ?? ''); ?>">
            </div>
            <div class="col-md-2">
                <button class="btn btn-primary w-100">Cari</button>
            </div>
        </form>
    </div>
</div>

<div class="soft-card">
    <div class="card-header">Data Peserta</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Peserta</th>
                        <th>Jekel</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['peserta'])) : ?>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">Data peserta tidak ditemukan.</div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($data['peserta'] as $p) : ?>
                            <tr>
                                <td><?= $p['id_peserta']; ?></td>
                                <td><strong><?= htmlspecialchars($p['nm_peserta']); ?></strong></td>
                                <td><?= htmlspecialchars($p['jekel']); ?></td>
                                <td><?= htmlspecialchars($p['alamat']); ?></td>
                                <td><?= htmlspecialchars($p['no_hp']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>