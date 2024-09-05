<?php
require_once '../config.php';

// Fungsi untuk mengambil data dari tabel perusahaan
function getPerusahaanData($table_name, $conn)
{
    $sql = "SELECT id, nama, tgl_lahir, alamat, kontak, nama_perusahaan FROM $table_name";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Loop data dan menampilkan di tabel
        $no = 1;
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $no . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['tgl_lahir'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td>" . $row['kontak'] . "</td>";
            echo "<td>" . $row['nama_perusahaan'] . "</td>";
            echo "<td class='action-btns'>
                    <a href='edit.php?id=" . $row['id'] . "&table=$table_name' class='edit-btn'>Edit</a>
                    <a href='delete.php?id=" . $row['id'] . "&table=$table_name' class='delete-btn' onclick='return confirm(\"Yakin ingin menghapus data ini?\");'>Delete</a>
                  </td>";
            echo "</tr>";
            $no++;
        }
    } else {
        echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
    }
}
