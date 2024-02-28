<?php
session_start();
include 'data.php';
if (!isset($_SESSION['user_id']) || !isset($_COOKIE['logged_in'])) {
    header('Location: index.php');
}
$username = $_SESSION['user_id'];
// Retrieve user data from array using the username
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
<a href="logout.php">Logout</a>