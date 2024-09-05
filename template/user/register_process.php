<?php
require_once '../config.php'; // Pastikan path ini benar sesuai dengan struktur folder Anda

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari form input
    $nama_lengkap = $_POST['name'];
    $username = $_POST['username'];
    $nama_perusahaan = $_POST['company'];
    $password = $_POST['password'];

    // Validasi data (tambahkan validasi sesuai kebutuhan)
    if (empty($nama_lengkap) || empty($username) || empty($password)) {
        echo "Harap isi semua field yang wajib diisi.";
    } else {
        // Mengamankan password dengan hash
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Query untuk memasukkan data ke tabel users
        $sql = "INSERT INTO users (nama_lengkap, username, nama_perusahaan, password) 
                    VALUES (?, ?, ?, ?)";

        // Menyiapkan statement MySQLi
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind parameter
            mysqli_stmt_bind_param($stmt, "ssss", $nama_lengkap, $username, $nama_perusahaan, $hashed_password);

            // Eksekusi statement
            if (mysqli_stmt_execute($stmt)) {
                echo "Registrasi berhasil!";
            } else {
                echo "Terjadi kesalahan saat menyimpan data: " . mysqli_error($conn);
            }

            // Menutup statement
            mysqli_stmt_close($stmt);
        } else {
            echo "Error preparing query: " . mysqli_error($conn);
        }
    }
}

// Menutup koneksi
mysqli_close($conn);
