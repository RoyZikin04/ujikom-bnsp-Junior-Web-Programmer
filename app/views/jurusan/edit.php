<div class="form-page">
    <div class="page-heading">
        <div class="page-title">Edit Jurusan</div>
        <p class="page-subtitle">Perbarui data jurusan.</p>
    </div>

    <div class="soft-card">
        <div class="card-body">
            <form action="<?= BASEURL; ?>/jurusan/update/<?= $data['jurusan']['kd_jurusan']; ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label">Kode Jurusan</label>
                    <input type="text" class="form-control" value="<?= htmlspecialchars($data['jurusan']['kd_jurusan']); ?>" readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Jurusan</label>
                    <input type="text" name="nm_jurusan" class="form-control" value="<?= htmlspecialchars($data['jurusan']['nm_jurusan'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['nm_jurusan'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Durasi</label>
                    <input type="text" name="durasi" class="form-control" value="<?= htmlspecialchars($data['jurusan']['durasi'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['durasi'] ?? ''; ?></small>
                </div>

                <div class="mb-3">
                    <label class="form-label">Biaya</label>
                    <input type="number" name="biaya" class="form-control" value="<?= htmlspecialchars($data['jurusan']['biaya'] ?? ''); ?>">
                    <small class="text-danger"><?= $data['errors']['biaya'] ?? ''; ?></small>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="<?= BASEURL; ?>/jurusan" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</div>