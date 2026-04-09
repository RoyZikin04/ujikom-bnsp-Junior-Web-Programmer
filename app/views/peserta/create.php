<div class="form-page">
    <div class="page-heading">
        <div class="page-title">Tambah Peserta</div>
        <p class="page-subtitle">Masukkan data peserta baru.</p>
    </div>

    <div class="soft-card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/peserta/store" method="POST">
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="kd_jurusan" class="form-select">
                        <option value="">-- Pilih Jurusan --</option>
                        <?php foreach (($data['jurusan'] ?? []) as $j) : ?>
                            <option value="<?= htmlspecialchars($j['kd_jurusan']); ?>" <?= (($data['old']['kd_jurusan'] ?? '') === $j['kd_jurusan']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($j['kd_jurusan']); ?> - <?= htmlspecialchars($j['nm_jurusan']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger"><?= $data['errors']['kd_jurusan'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Peserta</label>
                    <input type="text" name="nm_peserta" class="form-control" value="<?= htmlspecialchars($data['old']['nm_peserta'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['nm_peserta'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jekel" class="form-select">
                        <option value="">-- Pilih --</option>
                        <option value="L" <?= (($data['old']['jekel'] ?? '') === 'L') ? 'selected' : ''; ?>>L</option>
                        <option value="P" <?= (($data['old']['jekel'] ?? '') === 'P') ? 'selected' : ''; ?>>P</option>
                    </select>
                    <small class="text-danger"><?= $data['errors']['jekel'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"><?= htmlspecialchars($data['old']['alamat'] ?? ''); ?></textarea>
                    <small class="text-danger"><?= $data['errors']['alamat'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($data['old']['no_hp'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['no_hp'] ?? ''; ?></small>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="<?= BASEURL; ?>/peserta" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>