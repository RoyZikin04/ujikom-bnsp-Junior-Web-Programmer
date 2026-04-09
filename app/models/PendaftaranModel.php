<?php

class PendaftaranModel
{
    private $table = 'pendaftaran';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $query = "SELECT p.id_daftar, p.tgl_daftar, p.status,
                         ps.id_peserta, ps.nm_peserta,
                         j.kd_jurusan, j.nm_jurusan
                  FROM {$this->table} p
                  JOIN peserta ps ON p.id_peserta = ps.id_peserta
                  JOIN jurusan j ON p.kd_jurusan = j.kd_jurusan
                  ORDER BY p.id_daftar ASC";

        $this->db->query($query);
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE id_daftar = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = "INSERT INTO {$this->table}
                  (id_peserta, kd_jurusan, tgl_daftar, status)
                  VALUES
                  (:id_peserta, :kd_jurusan, :tgl_daftar, :status)";

        $this->db->query($query);
        $this->db->bind(':id_peserta', $data['id_peserta']);
        $this->db->bind(':kd_jurusan', $data['kd_jurusan']);
        $this->db->bind(':tgl_daftar', $data['tgl_daftar']);
        $this->db->bind(':status', $data['status']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE {$this->table} SET
                    id_peserta = :id_peserta,
                    kd_jurusan = :kd_jurusan,
                    tgl_daftar = :tgl_daftar,
                    status = :status
                  WHERE id_daftar = :id_daftar";

        $this->db->query($query);
        $this->db->bind(':id_peserta', $data['id_peserta']);
        $this->db->bind(':kd_jurusan', $data['kd_jurusan']);
        $this->db->bind(':tgl_daftar', $data['tgl_daftar']);
        $this->db->bind(':status', $data['status']);
        $this->db->bind(':id_daftar', $data['id_daftar']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateStatus($id, $status)
    {
        $query = "UPDATE {$this->table} SET status = :status WHERE id_daftar = :id_daftar";

        $this->db->query($query);
        $this->db->bind(':status', $status);
        $this->db->bind(':id_daftar', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_daftar = :id");
        $this->db->bind(':id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function countAll()
    {
        $this->db->query("SELECT COUNT(*) as total FROM {$this->table}");
        $result = $this->db->single();
        return (int) $result['total'];
    }

    public function countByStatus($status)
    {
        $this->db->query("SELECT COUNT(*) as total FROM {$this->table} WHERE status = :status");
        $this->db->bind(':status', $status);
        $result = $this->db->single();
        return (int) $result['total'];
    }

    public function getRecent($limit = 5)
    {
        $query = "SELECT p.id_daftar, p.tgl_daftar, p.status,
                         ps.nm_peserta,
                         j.nm_jurusan
                  FROM {$this->table} p
                  JOIN peserta ps ON p.id_peserta = ps.id_peserta
                  JOIN jurusan j ON p.kd_jurusan = j.kd_jurusan
                  ORDER BY p.id_daftar ASC
                  LIMIT :limit";

        $this->db->query($query);
        $this->db->bind(':limit', (int) $limit, PDO::PARAM_INT);
        return $this->db->resultSet();
    }
}