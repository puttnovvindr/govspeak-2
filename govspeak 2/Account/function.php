<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUsername() {
    if (isLoggedIn()) {
        return $_SESSION['user_name']; // Sesuaikan dengan field yang digunakan
    }
    return null;
}
?>
