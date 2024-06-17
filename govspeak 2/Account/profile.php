<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Koneksi ke database (ganti dengan informasi koneksi database kamu)
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "nama_database";

$conn = new mysqli($servername, $username, $password, $dbname);

// Ambil data pengguna dari database berdasarkan session user_id
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = $conn->query($sql);
$user = $result->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="profile">
        <h2>Profile</h2>
        <p>Welcome, <?php echo $user['name']; ?>!</p>
        <p>Email: <?php echo $user['email']; ?></p>
        <p><a href="edit_profile.php">Edit Profile</a></p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>
