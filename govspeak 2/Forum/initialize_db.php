<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'db.php';

// Baca isi file schema.sql
$sql = file_get_contents('schema.sql');

if ($conn->multi_query($sql) === TRUE) {
    echo "Database and tables created successfully";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>
