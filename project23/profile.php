<?php
session_start();

if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: login.php'); 
    exit();
}

$users = [
    [
        "username" => "johndoe",
        "password" => password_hash("password123", PASSWORD_DEFAULT), 
        "name" => "John Doe",
        "email" => "johndoe@example.com"
    ]
    // Add more users...
];

$username = $_SESSION['user_id'];
$user = null;
foreach ($users as $u) {
    if ($u['username'] === $username) {
        $user = $u;
        break;
    }
}

if ($user) {
    echo "Welcome, " . $user['name'] . "!";
    echo "<br>Email: " . $user['email'];
} else {
    echo "Error: User not found.";
}
?>
