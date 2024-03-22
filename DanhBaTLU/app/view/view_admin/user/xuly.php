<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password1 = $_POST['password1'];
        $role = $_POST['role'];
        $idnhanvien = $_POST['idnhanvien'];

        // Kiểm tra mật khẩu nhập lại
        if ($password != $password1) {
            header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=user&x=them&id=' . $username . '&msg=errorpass');
            exit();
        }

        try {
            // Kiểm tra xem tài khoản đã tồn tại chưa
            $check_query = "SELECT * FROM users WHERE username = :username";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':username', $username);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=user&x=them&id=' . $username . '&msg=error');
                exit();
            } else {
                // Thêm tài khoản mới vào cơ sở dữ liệu
                $sql = "INSERT INTO users (username, password, role, employeeID) VALUES (:username, :password, :role, :employeeID)";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':username', $username);
                // $hashed_password = password_hash($password, PASSWORD_DEFAULT); // Băm mật khẩu trước khi lưu vào cơ sở dữ liệu
                $stmt->bindParam(':password', $password);
                $stmt->bindParam(':role', $role);
                $stmt->bindParam(':employeeID', $idnhanvien);
                $stmt->execute();

                // Chuyển hướng với thông báo thành công
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qlnv&x=info&id=' . $idnhanvien . '&msg=success');
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else if (isset($_POST['doipass'])) {
        $username = $_POST['id'];
        $password = $_POST['password'];
        $pass1 = $_POST['password1'];
        $pass2 = $_POST['password2'];

        // Kiểm tra xác nhận mật khẩu mới
        if ($pass1 != $pass2) {
            header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=user&id=' . $username . '&msg=errorpass');
            exit(); // Ngăn chặn thực thi mã PHP tiếp theo sau khi chuyển hướng
        }

        // Thực hiện kiểm tra và cập nhật mật khẩu
        $check_query = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($check_query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        $user = $stmt->fetch();

        // Kiểm tra xem mật khẩu cũ có khớp không
        if (!$user || $user['password'] !== $password) {
            header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=user&id=' . $username . '&msg=passerror');
            exit(); // Ngăn chặn thực thi mã PHP tiếp theo sau khi chuyển hướng
        }

        // Cập nhật mật khẩu trong cơ sở dữ liệu
        $update_query = "UPDATE users SET password = :new_password WHERE username = :username";
        $stmt = $conn->prepare($update_query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':new_password', $pass1); // Sử dụng mật khẩu mới
        $stmt->execute();

        // Chuyển hướng với thông báo thành công
        header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=user&id=' . $username . '&msg=success');
        exit();
    }
}
