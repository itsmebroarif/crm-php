<?php
class Contact {
    private $conn;
    private $table = "contacts";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        return $this->conn->query("SELECT * FROM $this->table ORDER BY id DESC");
    }

    public function create($data) {
        $stmt = $this->conn->prepare(
            "INSERT INTO $this->table (nama_usaha,email,notelp,sosial_media) VALUES (?,?,?,?)"
        );
        $stmt->bind_param("ssss",
            $data['nama'],
            $data['email'],
            $data['telp'],
            $data['sosmed']
        );
        return $stmt->execute();
    }

    public function updateStatus($id, $status) {
        return $this->conn->query("UPDATE $this->table SET status='$status' WHERE id=$id");
    }

    public function updateProject($id, $project) {
        return $this->conn->query("UPDATE $this->table SET project_status='$project' WHERE id=$id");
    }

    public function delete($id) {
        return $this->conn->query("DELETE FROM $this->table WHERE id=$id");
    }
}
