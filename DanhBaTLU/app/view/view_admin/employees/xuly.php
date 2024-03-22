<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $mobilePhone = $_POST['mobilePhone'];
        $positionemployees = $_POST['positionemployees'];
        $departmentID = $_POST['departmentID'];

        $targetDirectory = APP_ROOT . "/public/img/";
        $targetFile = $targetDirectory . basename($_FILES["avatar"]["name"]); // Đường dẫn tập tin ảnh
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Định dạng file ảnh

        try {
            $check_query = "SELECT * FROM employees WHERE fullname = :fullname OR email = :email";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qlnv&x=them&msg=error');
                exit();
            } else {
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $targetFile)) {
                    echo "Tập tin đã được tải lên thành công.";
                } else {
                    echo "Có lỗi xảy ra khi tải lên tập tin.";
                }

                // Lưu tên tệp ảnh vào biến
                $avatarFileName = basename($_FILES["avatar"]["name"]);

                // Chuẩn bị câu truy vấn SQL
                $sql = "INSERT INTO employees (fullname, email, address, mobilePhone, positionemployees, avatar, departmentID) VALUES (:fullname, :email, :address, :mobilePhone, :positionemployees, :avatar, :departmentID)";
                $stmt = $conn->prepare($sql);

                // Bind các giá trị vào câu truy vấn
                $stmt->bindParam(':fullname', $fullname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':mobilePhone', $mobilePhone);
                $stmt->bindParam(':positionemployees', $positionemployees);
                $stmt->bindParam(':avatar', $avatarFileName); // Lưu tên tệp ảnh vào cơ sở dữ liệu
                $stmt->bindParam(':departmentID', $departmentID);
                $stmt->execute();

                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qlnv&x=them&msg=success');
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else if (isset($_POST['sua'])) {
        $employeeID = $_POST['id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $mobilePhone = $_POST['mobilePhone'];
        $positionemployees = $_POST['positionemployees'];
        $departmentID = $_POST['departmentID'];

        try {
            $check_query = "SELECT * FROM employees WHERE (fullname = :fullname OR email = :email) 
            AND employeeID != :employeeID";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':fullname', $fullname);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':employeeID', $employeeID); // Thêm tham số employeeID để loại trừ bản ghi hiện tại
            $stmt->execute();

            if ($stmt->rowCount() > 0) {
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qlnv&x=sua&id=' . $employeeID . '&msg=error');
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
                        $oldAvatarFile = $targetDirectory . $_POST['current_avatar'];
                        if (file_exists($oldAvatarFile)) {
                            unlink($oldAvatarFile);
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

                // Chuẩn bị câu truy vấn SQL
                $sql = "UPDATE employees SET fullname = :fullname, email = :email, address = :address, 
                mobilePhone = :mobilePhone, positionemployees = :positionemployees, avatar = :avatar, departmentID = :departmentID WHERE employeeID = :employeeID";
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

                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qlnv&x=sua&id=' . $employeeID . '&msg=success');
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
if (isset($_GET['id'])) {
    $employeeID = $_GET['id'];
    try {
        $conn->beginTransaction();
        $sql_xoa_user = "DELETE FROM users WHERE employeeID = :employeeID";
        $stmt_user = $conn->prepare($sql_xoa_user);
        $stmt_user->bindParam(':employeeID', $employeeID);
        $stmt_user->execute();
        //
        $sql_xoa_employee = "DELETE FROM employees WHERE employeeID = :employeeID";
        $stmt_employee = $conn->prepare($sql_xoa_employee);
        $stmt_employee->bindParam(':employeeID', $employeeID);
        $stmt_employee->execute();
        $conn->commit();
        header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qlnv&msg=xoasuccess');
        exit();
    } catch (PDOException $e) {
        $conn->rollBack();
        echo "Lỗi: " . $e->getMessage();
    }
}
