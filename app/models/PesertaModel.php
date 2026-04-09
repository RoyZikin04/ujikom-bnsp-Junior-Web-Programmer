<?php

class PesertaModel
{
    private $table = 'peserta';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll($keyword = null)
    {
        if ($keyword) {
            $this->db->query("SELECT p.*, j.nm_jurusan
                              FROM {$this->table} p
                              LEFT JOIN jurusan j ON p.kd_jurusan = j.kd_jurusan
                              WHERE p.nm_peserta LIKE :keyword
                              ORDER BY p.id_peserta ASC");
            $this->db->bind(':keyword', '%' . $keyword . '%');
        } else {
            $this->db->query("SELECT p.*, j.nm_jurusan
                              FROM {$this->table} p
                              LEFT JOIN jurusan j ON p.kd_jurusan = j.kd_jurusan
                              ORDER BY p.id_peserta ASC");
        }

        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT p.*, j.nm_jurusan
                          FROM {$this->table} p
                          LEFT JOIN jurusan j ON p.kd_jurusan = j.kd_jurusan
                          WHERE p.id_peserta = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = "INSERT INTO {$this->table} 
                  (kd_jurusan, nm_peserta, jekel, alamat, no_hp)
                  VALUES
                  (:kd_jurusan, :nm_peserta, :jekel, :alamat, :no_hp)";

        $this->db->query($query);
        $this->db->bind(':kd_jurusan', $data['kd_jurusan']);
        $this->db->bind(':nm_peserta', $data['nm_peserta']);
        $this->db->bind(':jekel', $data['jekel']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':no_hp', $data['no_hp']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE {$this->table} SET
                    kd_jurusan = :kd_jurusan,
                    nm_peserta = :nm_peserta,
                    jekel = :jekel,
                    alamat = :alamat,
                    no_hp = :no_hp
                  WHERE id_peserta = :id_peserta";

        $this->db->query($query);
        $this->db->bind(':kd_jurusan', $data['kd_jurusan']);
        $this->db->bind(':nm_peserta', $data['nm_peserta']);
        $this->db->bind(':jekel', $data['jekel']);
        $this->db->bind(':alamat', $data['alamat']);
        $this->db->bind(':no_hp', $data['no_hp']);
        $this->db->bind(':id_peserta', $data['id_peserta']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE id_peserta = :id");
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
}