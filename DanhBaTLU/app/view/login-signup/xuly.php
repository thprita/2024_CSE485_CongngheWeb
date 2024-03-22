<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['dangnhap'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password AND role=:role";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':role', $role);
        $stmt->execute();
        $user = $stmt->fetch();

        if ($user) {
            if ($role === 'admin') {
                $_SESSION['user_id'] = $user['username'];
                $_SESSION['user'] = $user['employeeID'];

                setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, "/");
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin');
                exit();
            } else {
                $_SESSION['user_id'] = $user['username'];
                $_SESSION['user'] = $user['employeeID'];
                setcookie('logged_in', true, time() + 60 * 60 * 24 * 30, "/");
                header('Location: ' . DOMAIN . '/public/index.php?controller=home');
                exit();
            }
        } else {
            header('Location: ' . DOMAIN . '/public/index.php?controller=login&msg=error');
            exit();
        }
    } else if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass1 = $_POST['password1'];
        $role = $_POST['role'];
        if ($password != $pass1) {
            header('Location: ' . DOMAIN . '/public/index.php?controller=signup&msg=error');
        } else {
            $check_query = "SELECT * FROM users WHERE username = :username";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                echo 'Lỗi: Tên người dùng đã tồn tại';
                exit();
            } else {

                $sql_insert = "INSERT INTO users (username, password, role) VALUES (:username, :password, :role)";
                $stmt = $conn->prepare($sql_insert);
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':role', $role);
                $stmt->execute();
                header('Location: ' . DOMAIN . '/public/index.php?controller=signup&msg=success');

                exit();
            }
        }
    }
}
