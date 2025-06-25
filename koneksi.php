<?php
/**
 * koneksi.php
 * File ini digunakan untuk membuat koneksi ke database MySQL.
 * Ganti nilai pada variabel $db_host, $db_user, $db_pass, dan $db_name
 * sesuai dengan konfigurasi server database Anda.
 */

// Konfigurasi koneksi database
$db_host = 'localhost'; // Host database, biasanya 'localhost'
$db_user = 'root';      // Username database
$db_pass = '';          // Password database, kosongkan jika tidak ada
$db_name = 'db_karyawan'; // Nama database yang sudah dibuat

// Membuat koneksi menggunakan mysqli
$koneksi = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

// Memeriksa apakah koneksi berhasil atau gagal
if (!$koneksi) {
    // Jika koneksi gagal, hentikan skrip dan tampilkan pesan error
    die("Koneksi ke database gagal: " . mysqli_connect_error());
}

// Jika berhasil, tidak akan ada output, dan file lain bisa menggunakan variabel $koneksi.
?>
