<?php
session_start();
include '../config/database.php'; // Sesuaikan dengan file konfigurasi database Anda

if (isset($_SESSION['user_id'])) {
    $userId = $_SESSION['user_id'];
    $query = "SELECT username, email FROM users WHERE id = ?";
    
    if ($stmt = $conn->prepare($query)) {
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $stmt->bind_result($username, $email);
        $stmt->fetch();
        $stmt->close();
        
        $response = array(
            'status' => 'success',
            'data' => array(
                'username' => $username,
                'email' => $email
            )
        );
        
        echo json_encode($response);
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Failed to prepare statement.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'User not logged in.'));
}
?>
