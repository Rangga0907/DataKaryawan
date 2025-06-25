
<?php
// Menyertakan file koneksi database
include 'koneksi.php';

// Inisialisasi variabel untuk pesan error atau sukses
$pesan = '';

// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mengambil data dari form dan membersihkannya untuk mencegah XSS
    $nip = htmlspecialchars($_POST['nip']);
    $nama = htmlspecialchars($_POST['nama']);
    $jabatan = htmlspecialchars($_POST['jabatan']);
    $departemen = htmlspecialchars($_POST['departemen']);
    $email = htmlspecialchars($_POST['email']);
    $no_telepon = htmlspecialchars($_POST['no_telepon']);

    // Query untuk memasukkan data baru ke dalam tabel karyawan
    $sql = "INSERT INTO karyawan (nip, nama, jabatan, departemen, email, no_telepon) VALUES ('$nip', '$nama', '$jabatan', '$departemen', '$email', '$no_telepon')";

    // Menjalankan query
    if (mysqli_query($koneksi, $sql)) {
        // Jika berhasil, redirect ke halaman utama
        header("Location: index.php");
        exit(); // Penting untuk menghentikan eksekusi skrip setelah redirect
    } else {
        // Jika gagal, tampilkan pesan error
        $pesan = "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Menutup koneksi database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Karyawan</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-8 flex justify-center">
        <div class="w-full max-w-lg">
            <div class="bg-white shadow-md rounded-lg p-8">
                <h1 class="text-2xl font-bold mb-6 text-center">Form Tambah Karyawan</h1>
                
                <?php if (!empty($pesan)): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?php echo $pesan; ?></span>
                    </div>
                <?php endif; ?>

                <!-- Form untuk menambah data -->
                <form action="tambah.php" method="POST">
                    <div class="mb-4">
                        <label for="nip" class="block text-gray-700 text-sm font-bold mb-2">NIP</label>
                        <input type="text" name="nip" id="nip" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="nama" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
                        <input type="text" name="nama" id="nama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    </div>
                    <div class="mb-4">
                        <label for="jabatan" class="block text-gray-700 text-sm font-bold mb-2">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="departemen" class="block text-gray-700 text-sm font-bold mb-2">Departemen</label>
                        <input type="text" name="departemen" id="departemen" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input type="email" name="email" id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="mb-6">
                        <label for="no_telepon" class="block text-gray-700 text-sm font-bold mb-2">No. Telepon</label>
                        <input type="text" name="no_telepon" id="no_telepon" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    </div>
                    <div class="flex items-center justify-between">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Simpan Data
                        </button>
                        <a href="index.php" class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
