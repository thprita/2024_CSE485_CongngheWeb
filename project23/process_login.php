<?php
session_start(); // Start session
include 'data.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Check if username exists
    $user = null;
    foreach ($users as $u) {
        if ($u['username'] === $username) {
            $user = $u;
            break;
        }
    }
    if ($user && password_verify($password, $user['password'])) {
        // Login successful
        $_SESSION['user_id'] = $user['username']; // Store user ID in session
        setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, "/");
        header('Location: profile.php'); 
    } else {
        echo 'Thông tin tài khoản sai';
        header('Location: index.php');
    }
}
