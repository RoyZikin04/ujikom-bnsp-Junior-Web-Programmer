<div class="d-flex justify-content-between align-items-center mb-3">
    <div>
        <div class="page-title">Data Pendaftaran</div>
        <p class="page-subtitle">Kelola pendaftaran peserta dan status belajarnya.</p>
    </div>
    <a href="<?= BASEURL; ?>/pendaftaran/create" class="btn btn-success">Tambah Pendaftaran</a>
</div>

<div class="soft-card">
    <div class="card-header">Daftar Pendaftaran</div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-modern align-middle mb-0">
                <thead>
                    <tr>
                        <th>Peserta</th>
                        <th>Jurusan</th>
                        <th>Tanggal</th>
                        <th width="260">Status</th>
                        <th width="170">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($data['pendaftaran'])) : ?>
                        <tr>
                            <td colspan="5">
                                <div class="empty-state">Belum ada data pendaftaran.</div>
                            </td>
                        </tr>
                    <?php else : ?>
                        <?php foreach ($data['pendaftaran'] as $p) : ?>
                            <tr>
                                <td>
                                    <strong><?= htmlspecialchars($p['nm_peserta']); ?></strong>
                                </td>
                                <td><?= htmlspecialchars($p['nm_jurusan']); ?></td>
                                <td><?= htmlspecialchars($p['tgl_daftar']); ?></td>
                                <td>
                                    <div class="d-flex gap-1 flex-wrap">
                                        <form action="<?= BASEURL; ?>/pendaftaran/status/<?= $p['id_daftar']; ?>" method="POST">
                                            <input type="hidden" name="status" value="Aktif">
                                            <button type="submit" class="btn btn-sm <?= $p['status'] === 'Aktif' ? 'btn-primary' : 'btn-outline-primary'; ?>">
                                                Aktif
                                            </button>
                                        </form>

                                        <form action="<?= BASEURL; ?>/pendaftaran/status/<?= $p['id_daftar']; ?>" method="POST">
                                            <input type="hidden" name="status" value="Selesai">
                                            <button type="submit" class="btn btn-sm <?= $p['status'] === 'Selesai' ? 'btn-success' : 'btn-outline-success'; ?>">
                                                Selesai
                                            </button>
                                        </form>

                                        <form action="<?= BASEURL; ?>/pendaftaran/status/<?= $p['id_daftar']; ?>" method="POST">
                                            <input type="hidden" name="status" value="Batal">
                                            <button type="submit" class="btn btn-sm <?= $p['status'] === 'Batal' ? 'btn-danger' : 'btn-outline-danger'; ?>">
                                                Batal
                                            </button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <div class="action-inline">
                                        <a href="<?= BASEURL; ?>/pendaftaran/edit/<?= $p['id_daftar']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="<?= BASEURL; ?>/pendaftaran/delete/<?= $p['id_daftar']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>