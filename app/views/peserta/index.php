<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <div class="page-title">Data Peserta</div>
        <p class="page-subtitle">Kelola seluruh data peserta kursus.</p>
    </div>
    <a href="<?= BASEURL; ?>/peserta/create" class="btn btn-success">Tambah Peserta</a>
</div>

<div class="soft-card">
    <div class="card-header">Daftar Peserta</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Kode Jurusan</th>
                        <th>Nama</th>
                        <th>Jekel</th>
                        <th>Alamat</th>
                        <th>No HP</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['peserta'])) : ?>
                        <tr>
                            <td colspan="7">
                                <div class="empty-state">Belum ada data peserta.</div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($data['peserta'] as $p) : ?>
                            <tr>
                                <td><?= $p['id_peserta']; ?></td>
                                <td><?= htmlspecialchars($p['kd_jurusan']); ?></td>
                                <td><strong><?= htmlspecialchars($p['nm_peserta']); ?></strong></td>
                                <td><?= htmlspecialchars($p['jekel']); ?></td>
                                <td><?= htmlspecialchars($p['alamat']); ?></td>
                                <td><?= htmlspecialchars($p['no_hp']); ?></td>
                                <td>
                                    <a href="<?= BASEURL; ?>/peserta/edit/<?= $p['id_peserta']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?= BASEURL; ?>/peserta/delete/<?= $p['id_peserta']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>