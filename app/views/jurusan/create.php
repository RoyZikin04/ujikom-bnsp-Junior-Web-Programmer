<div class="form-page">
    <div class="page-heading">
        <div class="page-title">Tambah Jurusan</div>
        <p class="page-subtitle">Masukkan data jurusan baru.</p>
    </div>

    <div class="soft-card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/jurusan/store" method="POST">
                <div class="mb-3">
                    <label class="form-label">Kode Jurusan</label>
                    <input type="text" name="kd_jurusan" class="form-control" value="<?= htmlspecialchars($data['old']['kd_jurusan'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['kd_jurusan'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Jurusan</label>
                    <input type="text" name="nm_jurusan" class="form-control" value="<?= htmlspecialchars($data['old']['nm_jurusan'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['nm_jurusan'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Durasi</label>
                    <input type="text" name="durasi" class="form-control" value="<?= htmlspecialchars($data['old']['durasi'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['durasi'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya</label>
                    <input type="number" name="biaya" class="form-control" value="<?= htmlspecialchars($data['old']['biaya'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['biaya'] ?? ''; ?></small>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="<?= BASEURL; ?>/jurusan" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>