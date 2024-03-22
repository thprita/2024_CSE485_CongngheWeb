<?php
// Định nghĩa đường dẫn gốc của ứng dụng
define('APP_ROOT', dirname(__FILE__, 4));
session_start();
session_regenerate_id(true);
session_destroy();

// Xóa cookie 'logged_in'
setcookie('logged_in', "", time() - 3600, "/"); // Đặt thời gian hết hạn ở trước thời điểm hiện tại

// Chuyển hướng người dùng đến trang đăng nhập hoặc đăng ký
header('Location: ' . APP_ROOT . '?controller=login-signup');
