# 🔐 Demo SQL Injection (PHP & MySQL)

Project ini merupakan simulasi sederhana untuk memahami celah keamanan **SQL Injection** dalam sistem login berbasis PHP.

Di dalam project ini terdapat dua versi login:
- 🔴 Versi **rentan (vulnerable)**
- 🟢 Versi **aman (secure)**

---
Dibuat oleh: **Anthonius Dale Fernando**  
NIM: **312410162**  
Untuk tugas **Pemrograman Web**
---

## 🚀 Fitur
- Login tanpa proteksi (raw query)
- Login dengan proteksi (prepared statement)
- Simulasi serangan SQL Injection
- Halaman artikel penjelasan

---

## 📂 Struktur Project

```bash
├── index.php           # Halaman utama
├── login_vuln.php      # Login rentan
├── login_secure.php    # Login aman
├── artikel.php         # Penjelasan
```

---

## ⚙️ Instalasi & Setup

### 1. Clone Repository

```bash
git clone https://github.com/username/nama-repo.git
```

---

### 2. Pindahkan ke XAMPP

```bash
C:\xampp\htdocs\nama-folder-project
```

---

### 3. Buat Database

Buka phpMyAdmin lalu jalankan:

```sql
CREATE DATABASE db_keamanan;

USE db_keamanan;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(50)
);

INSERT INTO users (username, password) VALUES ('admin', 'admin123');
```

---

### 4. Jalankan Project

Buka browser:

```bash
http://localhost/nama-folder-project/
```

---

## 🧪 Pengujian SQL Injection

### 🔴 Login Rentan

Gunakan input berikut:

```bash
Username: admin' OR '1'='1
Password: (kosong)
```

✅ Hasil: **Login berhasil tanpa password**

---

### 🟢 Login Aman

Gunakan input yang sama:

```bash
Username: admin' OR '1'='1
Password: (kosong)
```

❌ Hasil: **Login gagal (aman dari SQL Injection)**

---

## 💻 Perbandingan Kode

### ❌ Rentan

```php
$sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
```

Masalah:
- Input user langsung masuk ke query
- Bisa dimanipulasi oleh attacker

---

### ✅ Aman

```php
$stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE username = ? AND password = ?");
mysqli_stmt_bind_param($stmt, "ss", $username, $password);
mysqli_stmt_execute($stmt);
```

Keamanan:
- Menggunakan prepared statement
- Input tidak bisa mengubah struktur query

---

## 🎯 Kesimpulan

- SQL Injection adalah celah keamanan yang berbahaya
- Terjadi karena input tidak difilter
- Bisa dicegah dengan:
  - Prepared Statements
  - Validasi input

---


