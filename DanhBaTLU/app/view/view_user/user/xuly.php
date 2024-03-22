<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['sua'])) {
        $employeeID = $_POST['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $mobilePhone = $_POST['mobilePhone'];
        $positionemployees = $_POST['positionemployees'];
        $departmentID = $_POST['departmentID'];
        try {
            // Kiểm tra xem có bản ghi nào khác có cùng tên hoặc email không, ngoại trừ bản ghi hiện tại
            $check_query = "SELECT * FROM employees WHERE (fullname = :fullname OR email = :email) AND employeeID != :employeeID";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':employeeID', $employeeID); // Thêm tham số employeeID để loại trừ bản ghi hiện tại
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                // Nếu có bản ghi khác có cùng tên hoặc email, chuyển hướng với thông báo lỗi
                header('Location: ' . DOMAIN . '/public/index.php?controller=home&action=user&id=' . $employeeID . '&msg=error');
                exit();
            } else {
                // Kiểm tra nếu có file được tải lên
                if ($_FILES["avatar"]["size"] > 0) {
                    $targetDirectory = APP_ROOT . "/public/img/";
                    $targetFile = $targetDirectory . basename($_FILES["avatar"]["name"]);

                    // Di chuyển và lưu file ảnh mới
                    if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
                        echo "Tập tin đã được tải lên thành công.";

                        // Xóa file ảnh cũ nếu có file mới được tải lên
                        $oldavatar = $targetDirectory . $_POST['current_avatar'];
                        if (file_exists($oldavatar)) {
                            unlink($oldavatar);
                        }
                    } else {
                        echo "Có lỗi xảy ra khi tải lên tập tin.";
                    }

                    // Lưu tên tệp ảnh vào biến
                    $avatarFileName = basename($_FILES["avatar"]["name"]);
                } else {
                    // Nếu không có file được tải lên, giữ nguyên tên file cũ
                    $avatarFileName = $_POST['current_avatar']; // Giả sử bạn đã gửi tên file cũ từ form
                }

                // Lưu tên tệp ảnh vào biến
                $logoFileName = basename($_FILES["avatar"]["name"]);
                // Chuẩn bị câu truy vấn SQL
                $sql = "UPDATE employees SET fullname = :fullname, email = :email, address = :address, mobilePhone = :mobilePhone, positionemployees = :positionemployees, avatar = :avatar, departmentID = :departmentID WHERE employeeID = :employeeID";
                $stmt = $conn->prepare($sql);

                // Bind các giá trị vào câu truy vấn
                $stmt->bindParam(':employeeID', $employeeID);
                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':mobilePhone', $mobilePhone);
                $stmt->bindParam(':positionemployees', $positionemployees);
                $stmt->bindParam(':avatar', $avatarFileName);
                $stmt->bindParam(':departmentID', $departmentID);
                $stmt->execute();

                // Chuyển hướng với thông báo thành công
                header('Location: ' . DOMAIN . '/public/index.php?controller=home&action=user&id=' . $employeeID . '&msg=success');
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else if (isset($_POST['suauser'])) {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $pass1 = $_POST['password1'];
        $role = $_POST['role'];
        $idnhanvien = $_POST['employeeID'];
        if ($pass1 != $password) {
            header('Location: ' . DOMAIN . '/public/index.php?controller=home&action=user&x=tk&id=' . $id . '&msg=errorpass');
            exit(); // Ngăn chặn thực thi mã PHP tiếp theo sau khi chuyển hướng
        }
        $update_query = "UPDATE users SET username = :username, password = :new_password, role = :role WHERE employeeID = :id";
        $stmt = $conn->prepare($update_query);

        // Bind các giá trị vào câu lệnh SQL
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':new_password', $pass1); // Sử dụng mật khẩu mới
        $stmt->bindParam(':role', $role);
        $stmt->bindParam(':id', $id);

        // Thực thi câu lệnh SQL
        $stmt->execute();

        // Chuyển hướng với thông báo thành công
        header('Location: ' . DOMAIN . '/public/index.php?controller=home&action=user&x=tk&id=' . $id . '&msg=success');
        exit();
    }
}
