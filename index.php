<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Data Karyawan</title>
    <!-- Menggunakan Tailwind CSS untuk styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Menambahkan style dasar untuk body */
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto p-4 sm:p-6 lg:p-8">
        <div class="bg-white shadow-md rounded-lg p-6">
            <h1 class="text-3xl font-bold mb-4 text-center text-gray-700">Data Karyawan</h1>
            
            <!-- Tombol untuk menambah data karyawan baru -->
            <div class="mb-6">
                <a href="tambah.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300 ease-in-out inline-block">
                    + Tambah Karyawan Baru
                </a>
            </div>

            <!-- Tabel untuk menampilkan data karyawan -->
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <tr>
                            <th class="py-3 px-6 text-left">NIP</th>
                            <th class="py-3 px-6 text-left">Nama</th>
                            <th class="py-3 px-6 text-left">Jabatan</th>
                            <th class="py-3 px-6 text-left">Departemen</th>
                            <th class="py-3 px-6 text-left">Email</th>
                            <th class="py-3 px-6 text-left">No. Telepon</th>
                            <th class="py-3 px-6 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                        <?php
                        // Menyertakan file koneksi database
                        include 'koneksi.php';

                        // Query untuk mengambil semua data dari tabel karyawan
                        $sql = "SELECT * FROM karyawan";
                        $hasil = mysqli_query($koneksi, $sql);

                        // Memeriksa apakah ada data yang ditemukan
                        if (mysqli_num_rows($hasil) > 0) {
                            // Looping untuk menampilkan setiap baris data
                            while ($row = mysqli_fetch_assoc($hasil)) {
                                echo "<tr class='border-b border-gray-200 hover:bg-gray-100'>";
                                echo "<td class='py-3 px-6 text-left whitespace-nowrap'>" . htmlspecialchars($row['nip']) . "</td>";
                                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['nama']) . "</td>";
                                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['jabatan']) . "</td>";
                                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['departemen']) . "</td>";
                                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['email']) . "</td>";
                                echo "<td class='py-3 px-6 text-left'>" . htmlspecialchars($row['no_telepon']) . "</td>";
                                echo "<td class='py-3 px-6 text-center'>";
                                // Tombol Edit dan Hapus
                                echo "<a href='edit.php?id=" . $row['id'] . "' class='bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-1 px-3 rounded text-xs mr-2'>Edit</a>";
                                echo "<a href='hapus.php?id=" . $row['id'] . "' class='bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>";
                                echo "</td>";
                                echo "</tr>";
                            }
                        } else {
                            // Jika tidak ada data, tampilkan pesan
                            echo "<tr><td colspan='7' class='py-3 px-6 text-center'>Tidak ada data karyawan.</td></tr>";
                        }
                        // Menutup koneksi database
                        mysqli_close($koneksi);
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
