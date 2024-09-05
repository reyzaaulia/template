<?php
session_start();
require_once '../config.php';

// Pastikan pengguna sudah login dan perusahaan_id tersedia dalam session
if (!isset($_SESSION['username']) || !isset($_SESSION['nama_perusahaan'])) {
    die("Anda belum login atau tidak memiliki akses.");
}

// Ambil perusahaan_id dari session
$nama_perusahaan = $_SESSION['nama_perusahaan'];

// Mapping perusahaan_id ke nama tabel
$table_map = [
    1 => 'perusahaana',
    2 => 'perusahaanb',
    3 => 'perusahaanc',
    4 => 'perusahaand',
];

// Tentukan nama tabel berdasarkan perusahaan_id
if (isset($table_map[$nama_perusahaan])) {
    $table = $table_map[$nama_perusahaan];
} else {
    die("Perusahaan tidak valid.");
}

function getPerusahaanData($table_name, $conn)
{
    // Periksa apakah tabel mengandung data berdasarkan perusahaan_id
    $sql = "SELECT id, nama, tgl_lahir, alamat, kontak, nama_perusahaan FROM $table_name";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['tgl_lahir'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['kontak'] . "</td>";
            echo "<td>" . $row['nama_perusahaan'] . "</td>";
            echo "</tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
    }

    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Dashboard</title>
    <!-- Bootstrap CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        /* CSS styles (same as before) */
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <!-- Menampilkan tautan untuk perusahaan yang relevan saja -->
                <?php if ($nama_perusahaan === 1): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?table=perusahaana">Perusahaan A</a>
                    </li>
                <?php elseif ($nama_perusahaan === 2): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?table=perusahaanb">Perusahaan B</a>
                    </li>
                <?php elseif ($nama_perusahaan === 3): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?table=perusahaanc">Perusahaan C</a>
                    </li>
                <?php elseif ($nama_perusahaan === 4): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard.php?table=perusahaand">Perusahaan D</a>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="profile-container ml-3">
                <button class="profile-button" id="profileButton">
                    <img src="https://via.placeholder.com/40" alt="User Avatar" />
                </button>
                <div class="dropdown-menu" id="dropdownMenu">
                    <a href="#" class="logout">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="content">
        <div class="table-wrapper">
            <!-- Tombol Ekspor -->
            <button class="btn-custom btn-export" id="exportBtn">Excel</button>
            <button class="btn-custom btn-report" id="reportBtn">Report</button>

            <h4>Data <?php echo ucfirst(str_replace('_', ' ', $table)); ?></h4>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Perusahaan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Tampilkan data dari tabel yang dipilih
                    getPerusahaanData($table, $nama_perusahaan, $conn);
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Toggle dropdown menu visibility on profile button click
        document.getElementById('profileButton').addEventListener('click', function() {
            var dropdownMenu = document.getElementById('dropdownMenu');
            if (dropdownMenu.style.display === 'block') {
                dropdownMenu.style.display = 'none';
            } else {
                dropdownMenu.style.display = 'block';
            }
        });

        // Hide dropdown when clicking outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.profile-button') && !event.target.matches('.profile-button img')) {
                var dropdowns = document.getElementsByClassName('dropdown-menu');
                for (var i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.style.display === 'block') {
                        openDropdown.style.display = 'none';
                    }
                }
            }
        };

        // Handle export button click (this is a placeholder, you would implement actual export logic)
        document.getElementById('exportBtn').addEventListener('click', function() {
            alert('Ekspor data dalam format CSV atau Excel');
        });
    </script>
</body>

</html>