# 🚀 Simple CRM Freelance (PHP OOP + MySQL)

Sistem CRM sederhana untuk freelancer web developer untuk:

* Menyimpan data client
* Tracking status komunikasi
* Tracking progress project
* Kirim pesan langsung via WhatsApp & Email
* Search client secara real-time

---

## ✨ Fitur Utama

* ✅ CRUD Client (Tambah, Hapus)
* ✅ Search client (real-time, tanpa reload)
* ✅ Kirim WhatsApp otomatis (auto format nomor)
* ✅ Kirim Email via `mailto`
* ✅ Status client:

  * `belum` (belum dihubungi)
  * `sudah` (sudah dihubungi)
* ✅ Project status:

  * `none`
  * `berjalan`
  * `selesai`
* ✅ UI modern (Bootstrap 5)
* ✅ Modal form (clean & responsive)

---

## 🧱 Tech Stack

* PHP Native (OOP)
* MySQL
* Bootstrap 5 (CDN)
* JavaScript Vanilla

---

## 📂 Struktur Folder

```
crm-oop/
│
├── config/
│   ├── database.php
│   └── table.sql
│
├── controllers/
│   └── ContactController.php
│
├── models/
│   └── Contact.php
│
├── views/
│   ├── layout/
│   │   ├── header.php
│   │   ├── footer.php
│   │   └── sidebar.php
│   │
│   └── dashboard.php
│
├── index.php
└── README.md
```

---

## ⚙️ Setup Project

### 1. Clone Repository

```bash
git clone https://github.com/username/crm-oop.git
cd crm-oop
```

---

### 2. Setup Database

1. Buka **Navicat / phpMyAdmin**
2. Buat database baru:

```sql
CREATE DATABASE crm_oop;
USE crm_oop;
```

3. Import file SQL:

```
config/table.sql
```

---

### 3. Konfigurasi Database

Edit file:

```
config/database.php
```

Sesuaikan:

```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "crm_oop";
```

---

### 4. Jalankan Project

Kalau pakai Laragon / XAMPP:

```
http://localhost/crm-oop
```

---

## 📱 Fitur WhatsApp

Simpan nomor dengan format standar internasional:

```
08xxxx → 628xxxx
```

Link:

```
https://wa.me/{nomor}
```

---

## 🔍 Fitur Search

* Real-time filtering (tanpa reload)
* Berdasarkan nama usaha
* Menggunakan JavaScript DOM filtering

---

## 📊 Workflow Penggunaan

1. Tambah client
2. Klik client di sidebar
3. Kirim penawaran:

   * WhatsApp
   * Email
4. Update status:

   * Sudah dihubungi
5. Update project:

   * Berjalan / selesai

---

## ⚠️ Catatan

* Tidak menggunakan API eksternal
* Tidak ada authentication (basic use only)
* Cocok untuk freelancer / personal use

---

## 🎯 Tujuan Project

Membantu freelancer:

* Tidak kehilangan data client
* Lebih terstruktur dalam follow-up
* Lebih cepat closing deal

---

## 🧨 Disclaimer

Kalau client tetap tidak deal, itu bukan salah sistem.

---

## 👨‍💻 Author

Dibuat untuk kebutuhan freelance & latihan sistem CRM sederhana.

---

## ⭐ Bonus Tips

Tool ini tidak akan menghasilkan uang kalau kamu:

* Tidak outreach client
* Tidak follow up
* Tidak kirim proposal

Gunakan. Jangan dikoleksi saja.
