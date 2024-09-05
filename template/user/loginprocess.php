<?php
session_start();
require_once '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT id, nama_perusahaan, password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die('Prepare failed: ' . htmlspecialchars($conn->error));
}

$stmt->bind_param('s', $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die('Execute failed: ' . htmlspecialchars($stmt->error));
}

if ($result->num_rows > 0) {
    $username = $result->fetch_assoc();

    // Debug output
    echo 'Stored hashed password: ' . htmlspecialchars($username['password']) . '<br>';

    if (password_verify($password, $username['password'])) {
        $_SESSION['username'] = $username['id'];
        $_SESSION['nama_perusahaan'] = $username['nama_perusahaan'];
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Username or password is incorrect.";
    }
} else {
    echo "Username or password is incorrect.";
}

$stmt->close();
$conn->close();
