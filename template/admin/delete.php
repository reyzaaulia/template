<?php
include 'config.php';

// Validate and sanitize table name from the URL parameter
$table = isset($_GET['table']) ? preg_replace('/[^a-zA-Z0-9_]/', '', $_GET['table']) : '';
$id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Ensure ID is an integer

// Ensure table name is valid
$valid_tables = ['perusahaana', 'perusahaanb', 'perusahaanc', 'perusahaand'];
if (in_array($table, $valid_tables)) {
    // Prepare SQL statement
    $sql = "DELETE FROM $table WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the page where the data is listed after successful deletion
        header("Location: dashboard.php");  // Replace with your actual page
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid table name.";
}
