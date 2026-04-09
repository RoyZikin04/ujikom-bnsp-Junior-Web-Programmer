<div class="form-page">
    <div class="page-heading">
        <div class="page-title">Edit Peserta</div>
        <p class="page-subtitle">Perbarui data peserta.</p>
    </div>

    <div class="soft-card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/peserta/update/<?= $data['peserta']['id_peserta']; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Jurusan</label>
                    <select name="kd_jurusan" class="form-select">
                        <option value="">-- Pilih Jurusan --</option>
                        <?php foreach (($data['jurusan'] ?? []) as $j) : ?>
                            <option value="<?= htmlspecialchars($j['kd_jurusan']); ?>" <?= (($data['peserta']['kd_jurusan'] ?? '') === $j['kd_jurusan']) ? 'selected' : ''; ?>>
                                <?= htmlspecialchars($j['kd_jurusan']); ?> - <?= htmlspecialchars($j['nm_jurusan']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <small class="text-danger"><?= $data['errors']['kd_jurusan'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Peserta</label>
                    <input type="text" name="nm_peserta" class="form-control" value="<?= htmlspecialchars($data['peserta']['nm_peserta'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['nm_peserta'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Jenis Kelamin</label>
                    <select name="jekel" class="form-select">
                        <option value="">-- Pilih --</option>
                        <option value="L" <?= (($data['peserta']['jekel'] ?? '') === 'L') ? 'selected' : ''; ?>>L</option>
                        <option value="P" <?= (($data['peserta']['jekel'] ?? '') === 'P') ? 'selected' : ''; ?>>P</option>
                    </select>
                    <small class="text-danger"><?= $data['errors']['jekel'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"><?= htmlspecialchars($data['peserta']['alamat'] ?? ''); ?></textarea>
                    <small class="text-danger"><?= $data['errors']['alamat'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="<?= htmlspecialchars($data['peserta']['no_hp'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['no_hp'] ?? ''; ?></small>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="<?= BASEURL; ?>/peserta" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>