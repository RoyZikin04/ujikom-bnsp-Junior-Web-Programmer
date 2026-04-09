<div class="form-page">
    <div class="page-heading">
        <div class="page-title">Edit Pendaftaran</div>
        <p class="page-subtitle">Perbarui data pendaftaran peserta.</p>
    </div>

    <div class="soft-card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/pendaftaran/update/<?= $data['pendaftaran']['id_daftar']; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Peserta</label>
                    <select name="id_peserta" id="id_peserta" class="form-select">
                        <option value="">-- Pilih Peserta --</option>
                        <?php foreach ($data['peserta'] as $ps) : ?>
                            <option
                                value="<?= $ps['id_peserta']; ?>"
                                data-kd-jurusan="<?= htmlspecialchars($ps['kd_jurusan'] ?? ''); ?>"
                                <?= (($data['pendaftaran']['id_peserta'] ?? '') == $ps['id_peserta']) ? 'selected' : ''; ?>
                            >
                                <?= htmlspecialchars($ps['nm_peserta']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger"><?= $data['errors']['id_peserta'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select id="kd_jurusan" class="form-select" disabled>
                        <option value="">-- Pilih Jurusan --</option>
                        <?php foreach ($data['jurusan'] as $j) : ?>
                            <option
                                value="<?= $j['kd_jurusan']; ?>"
                                <?= (($data['pendaftaran']['kd_jurusan'] ?? '') == $j['kd_jurusan']) ? 'selected' : ''; ?>
                            >
                                <?= htmlspecialchars($j['nm_jurusan']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <input
                        type="hidden"
                        name="kd_jurusan"
                        id="kd_jurusan_hidden"
                        value="<?= htmlspecialchars($data['pendaftaran']['kd_jurusan'] ?? ''); ?>"
                    >
                    <small class="text-danger"><?= $data['errors']['kd_jurusan'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Tanggal Daftar</label>
                    <input
                        type="date"
                        name="tgl_daftar"
                        class="form-control"
                        value="<?= htmlspecialchars($data['pendaftaran']['tgl_daftar'] ?? ''); ?>"
                    >
                    <small class="text-danger"><?= $data['errors']['tgl_daftar'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="Aktif" <?= (($data['pendaftaran']['status'] ?? '') === 'Aktif') ? 'selected' : ''; ?>>Aktif</option>
                        <option value="Selesai" <?= (($data['pendaftaran']['status'] ?? '') === 'Selesai') ? 'selected' : ''; ?>>Selesai</option>
                        <option value="Batal" <?= (($data['pendaftaran']['status'] ?? '') === 'Batal') ? 'selected' : ''; ?>>Batal</option>
                    </select>
                    <small class="text-danger"><?= $data['errors']['status'] ?? ''; ?></small>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="<?= BASEURL; ?>/pendaftaran" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>

<script>
(function () {
    var pesertaSelect = document.getElementById('id_peserta');
    var jurusanSelect = document.getElementById('kd_jurusan');
    var jurusanHidden = document.getElementById('kd_jurusan_hidden');

    if (!pesertaSelect || !jurusanSelect || !jurusanHidden) return;

    function syncJurusan() {
        var selected = pesertaSelect.options[pesertaSelect.selectedIndex];
        var kdJurusan = selected ? selected.getAttribute('data-kd-jurusan') : '';

        jurusanSelect.value = kdJurusan || '';
        jurusanHidden.value = kdJurusan || '';
    }

    pesertaSelect.addEventListener('change', syncJurusan);
    syncJurusan();
})();
</script>