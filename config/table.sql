CREATE DATABASE crm_oop;
USE crm_oop;

CREATE TABLE contacts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_usaha VARCHAR(255) NOT NULL,
    email VARCHAR(255),
    notelp VARCHAR(50),
    sosial_media VARCHAR(255),
    status ENUM('belum','sudah') DEFAULT 'belum',
    project_status ENUM('none','berjalan','selesai') DEFAULT 'none',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);