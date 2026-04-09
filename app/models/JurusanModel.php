<?php

class JurusanModel
{
    private $table = 'jurusan';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAll()
    {
        $this->db->query("SELECT * FROM {$this->table} ORDER BY kd_jurusan ASC");
        return $this->db->resultSet();
    }

    public function getById($id)
    {
        $this->db->query("SELECT * FROM {$this->table} WHERE kd_jurusan = :id");
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function create($data)
    {
        $query = "INSERT INTO {$this->table}
                  (kd_jurusan, nm_jurusan, durasi, biaya)
                  VALUES
                  (:kd_jurusan, :nm_jurusan, :durasi, :biaya)";

        $this->db->query($query);
        $this->db->bind(':kd_jurusan', $data['kd_jurusan']);
        $this->db->bind(':nm_jurusan', $data['nm_jurusan']);
        $this->db->bind(':durasi', $data['durasi']);
        $this->db->bind(':biaya', $data['biaya']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function update($data)
    {
        $query = "UPDATE {$this->table} SET
                    nm_jurusan = :nm_jurusan,
                    durasi = :durasi,
                    biaya = :biaya
                  WHERE kd_jurusan = :kd_jurusan";

        $this->db->query($query);
        $this->db->bind(':nm_jurusan', $data['nm_jurusan']);
        $this->db->bind(':durasi', $data['durasi']);
        $this->db->bind(':biaya', $data['biaya']);
        $this->db->bind(':kd_jurusan', $data['kd_jurusan']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function delete($id)
    {
        $this->db->query("DELETE FROM {$this->table} WHERE kd_jurusan = :id");
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