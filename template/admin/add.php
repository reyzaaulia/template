<?php
require_once '../config.php';

// Retrieve the table name from the URL parameter and sanitize it
$table = isset($_GET['table']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table']) : '';

// Ensure table name is valid
$valid_tables = ['perusahaana', 'perusahaanb', 'perusahaanc', 'perusahaand'];
if (!in_array($table, $valid_tables)) {
    die("Invalid table name.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $nama_perusahaan = $_POST['nama_perusahaan'];

    // Insert data into the specified table
    $sql = "INSERT INTO $table (nama, tgl_lahir, alamat, kontak, nama_perusahaan) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nama, $tgl_lahir, $alamat, $kontak, $nama_perusahaan);

    if ($stmt->execute()) {
        // Redirect to dashboard.php after a successful insert
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }
} else {
    // Display the form
?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Data</title>
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container mt-4">
            <h2>Add Data to <?php echo htmlspecialchars($table); ?></h2>
            <form action="add.php?table=<?php echo urlencode($table); ?>" method="post">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>

                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" required>
                </div>

                <div class="mb-3">
                    <label for="kontak" class="form-label">Kontak</label>
                    <input type="text" class="form-control" id="kontak" name="kontak" required>
                </div>

                <div class="mb-3">
                    <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                    <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
            </form>
        </div>

        <!-- Bootstrap JavaScript Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>

<?php
}
?>