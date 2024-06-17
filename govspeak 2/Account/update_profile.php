<?php
session_start();
include '../config/database.php'; // Sesuaikan dengan file konfigurasi database Anda

if (isset($_POST['username']) && isset($_POST['email']) && isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    
    $query = "UPDATE users SET username = ?, email = ? WHERE id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("ssi", $username, $email, $userId);
        if ($stmt->execute()) {
            $_SESSION['user_name'] = $username; // Perbarui session
            header('Location: ../Homepage/homepage.php');
        } else {
            echo "Failed to update profile.";
        }
        $stmt->close();
    } else {
        echo "Failed to prepare statement.";
    }
} else {
    echo "Invalid input.";
}
?>
