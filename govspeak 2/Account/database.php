<?php
$servername = "localhost";  // Nama host database
$username = "root";         // Username database
$password = "";             // Password database
$dbname = "login_db";       // Nama database

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
