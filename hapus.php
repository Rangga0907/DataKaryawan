<?php
// Menyertakan file koneksi database
include 'koneksi.php';

// Memeriksa apakah ID dikirim melalui GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data karyawan berdasarkan ID
    $sql = "DELETE FROM karyawan WHERE id=$id";

    // Menjalankan query
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, redirect kembali ke halaman utama
        header("Location: index.php");
        exit();
    } else {
        // Jika gagal, tampilkan pesan error
        echo "Error: " . mysqli_error($koneksi);
    }
} else {
    // Jika tidak ada ID, redirect ke halaman utama
    header("Location: index.php");
    exit();
}

// Menutup koneksi database
mysqli_close($koneksi);
?>
