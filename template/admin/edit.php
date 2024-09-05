<?php
require_once '../config.php';

// Validate and sanitize table name from the URL parameter
$table = isset($_GET['table']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table']) : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle form submission
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];
    $kontak = $_POST['kontak'];
    $nama_perusahaan = $_POST['nama_perusahaan'];

    // Ensure table name is valid
    if (in_array($table, ['perusahaana', 'perusahaanb', 'perusahaanc', 'perusahaand'])) {
        $sql = "UPDATE $table SET
                nama='$nama',
                tgl_lahir='$tgl_lahir',
                alamat='$alamat',
                kontak='$kontak',
                nama_perusahaan='$nama_perusahaan'
                WHERE id=$id";

        if ($conn->query($sql) === TRUE) {
            // Redirect to dashboard.php after a successful update
            header("Location: dashboard.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Invalid table name.";
    }
} else {
    // Display the form
    $id = $_GET['id'];

    // Ensure table name is valid
    if (in_array($table, ['perusahaana', 'perusahaanb', 'perusahaanc', 'perusahaand'])) {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Data</title>
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>

        <body>
            <div class="container mt-4">
                <h2>Edit Data</h2>

                <form action="edit.php?table=<?php echo htmlspecialchars($table); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?php echo htmlspecialchars($row['nama']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?php echo htmlspecialchars($row['tgl_lahir']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo htmlspecialchars($row['alamat']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="kontak" class="form-label">Kontak</label>
                        <input type="text" class="form-control" id="kontak" name="kontak" value="<?php echo htmlspecialchars($row['kontak']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="nama_perusahaan" class="form-label">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?php echo htmlspecialchars($row['nama_perusahaan']); ?>" required>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Kirim</button>
                    </div>
                </form>
            </div>

            <!-- Bootstrap JavaScript Bundle with Popper -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
        </body>

        </html>

<?php
    } else {
        echo "Invalid table name.";
    }
}
?>