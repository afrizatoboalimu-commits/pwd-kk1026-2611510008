<?php
// koneksi.php - Konfigurasi koneksi PHP-MySQL menggunakan MySQLi (RPS P11)
$host     = "localhost";
$username = "root";
$password = ""; // Default Laragon kosong
$database = "db_pwd_2611510008";

// Menonaktifkan exception otomatis agar kegagalan koneksi bisa ditangani secara manual
mysqli_report(MYSQLI_REPORT_OFF);

$conn = mysqli_connect($host, $username, $password, $database);

// Penanganan kondisi kegagalan koneksi (RPS P11)
if (!$conn) {
    die("Koneksi ke basis data gagal: " . htmlspecialchars(mysqli_connect_error(), ENT_QUOTES, "UTF-8"));
}

mysqli_set_charset($conn, "utf8mb4");
