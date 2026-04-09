<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <div class="page-title">Data Jurusan</div>
        <p class="page-subtitle">Kelola daftar jurusan, durasi, dan biaya kursus.</p>
    </div>
    <a href="<?= BASEURL; ?>/jurusan/create" class="btn btn-success">Tambah Jurusan</a>
</div>

<div class="soft-card">
    <div class="card-header">Daftar Jurusan</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Jurusan</th>
                        <th>Durasi</th>
                        <th>Biaya</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['jurusan'])) : ?>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">Belum ada data jurusan.</div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($data['jurusan'] as $j) : ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($j['kd_jurusan']); ?></strong></td>
                                <td><?= htmlspecialchars($j['nm_jurusan']); ?></td>
                                <td><?= htmlspecialchars($j['durasi']); ?></td>
                                <td>Rp <?= number_format($j['biaya'], 0, ',', '.'); ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/jurusan/edit/<?= $j['kd_jurusan']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= BASEURL; ?>/jurusan/delete/<?= $j['kd_jurusan']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>