<?php
// Konfigurasi koneksi ke database klinik1
$host = 'localhost';    // Server database (biasanya 'localhost')
$user = 'root';         // Nama pengguna MySQL
$password = '';         // Password MySQL (kosong jika tidak ada password)
$dbname = 'klinik1';    // Nama database

// Membuat koneksi ke database
$conn = new mysqli($host, $user, $password, $dbname);

// Cek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
} else {
    // Jika berhasil, bisa tampilkan pesan atau biarkan kosong
    // echo "Koneksi berhasil!";
}

// Menutup koneksi di akhir skrip
// $conn->close();
?>
