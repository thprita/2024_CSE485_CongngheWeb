<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['add'])) {
        $departmentName = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['mobile'];
        $website = $_POST['website'];
        $bpgid = $_POST['bpgid'];
        $targetDirectory = APP_ROOT . "/public/img/";
        $targetFile = $targetDirectory . basename($_FILES["file"]["name"]); // Đường dẫn tập tin ảnh
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION)); // Định dạng file ảnh
        try {
            $check_query = "SELECT * FROM departments WHERE departmentName = :departmentName OR email = :email";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':departmentName', $departmentName);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qldv&x=them&msg=error');
                exit();
            } else {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                    echo "Tập tin đã được tải lên thành công.";
                } else {
                    echo "Có lỗi xảy ra khi tải lên tập tin.";
                }
                // Lưu tên tệp ảnh vào biến
                $logoFileName = basename($_FILES["file"]["name"]);

                // Chuẩn bị câu truy vấn SQL
                $sql = "INSERT INTO departments (departmentName, email, address, phone, logo, website,parentDepartmentID) VALUES (:departmentName, :email, :address, :phone, :logo, :website,:bpgid)";
                $stmt = $conn->prepare($sql);

                // Bind các giá trị vào câu truy vấn
                $stmt->bindParam(':departmentName', $departmentName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':logo', $logoFileName); // Lưu tên tệp ảnh vào cơ sở dữ liệu
                $stmt->bindParam(':website', $website);
                $stmt->bindParam(':bpgid', $bpgid);
                $stmt->execute();
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qldv&x=them&msg=success');
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    } else if (isset($_POST['sua'])) {
        $departmentid = $_POST['id'];
        $departmentName = $_POST['username'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $phone = $_POST['mobile'];
        $website = $_POST['website'];
        $bpgid = $_POST['bpgid'];
        try {
            $check_query = "SELECT * FROM departments WHERE (departmentName = :departmentName OR email = :email) 
            AND departmentID != :departmentid";
            $stmt = $conn->prepare($check_query);
            $stmt->bindParam(':departmentName', $departmentName);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':departmentid', $departmentid); // Thêm tham số departmentID để loại trừ bản ghi hiện tại
            $stmt->execute();
            if ($stmt->rowCount() > 0) {
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qldv&x=sua&id=' . $departmentid . '&msg=error');
                exit();
            } else {
                // Kiểm tra nếu có file được tải lên
                if ($_FILES["file"]["size"] > 0) {
                    $targetDirectory = APP_ROOT . "/public/img/";
                    $targetFile = $targetDirectory . basename($_FILES["file"]["name"]);

                    // Di chuyển và lưu file ảnh mới
                    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                        $oldLogoFile = $targetDirectory . $_POST['current_logo'];
                        if (file_exists($oldLogoFile)) {
                            unlink($oldLogoFile);
                        }
                    } else {
                        echo "Có lỗi xảy ra khi tải lên tập tin.";
                    }

                    // Lưu tên tệp ảnh vào biến
                    $logoFileName = basename($_FILES["file"]["name"]);
                } else {
                    // Nếu không có file được tải lên, giữ nguyên tên file cũ
                    $logoFileName = $_POST['current_logo']; // Giả sử bạn đã gửi tên file cũ từ form
                }


                // Chuẩn bị câu truy vấn SQL
                $sql = "UPDATE departments SET departmentName = :departmentName, email = :email, address = :address, 
                phone = :phone, logo = :logo, website = :website,parentDepartmentID=:bpgid WHERE departmentID = :departmentid";
                $stmt = $conn->prepare($sql);

                // Bind các giá trị vào câu truy vấn
                $stmt->bindParam(':departmentid', $departmentid);
                $stmt->bindParam(':departmentName', $departmentName);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':address', $address);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':logo', $logoFileName);
                $stmt->bindParam(':website', $website);
                $stmt->bindParam(':bpgid', $bpgid);
                $stmt->execute();
                header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qldv&x=sua&id=' . $departmentid . '&msg=success');
                exit();
            }
        } catch (PDOException $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }
}
if (isset($_GET['id'])) {
    // Lấy ID từ URL
    $departmentID = $_GET['id'];
    //
    $sqlUpdateEmployees = "UPDATE employees SET departmentID = NULL WHERE departmentID = :departmentID";
    $stmtUpdateEmployees = $conn->prepare($sqlUpdateEmployees);
    $stmtUpdateEmployees->bindParam(':departmentID', $departmentID);
    $stmtUpdateEmployees->execute();

    //
    $sqlUpdateDepartments = "UPDATE departments SET parentDepartmentID = NULL WHERE parentDepartmentID = :departmentID";
    $stmtUpdateDepartments = $conn->prepare($sqlUpdateDepartments);
    $stmtUpdateDepartments->bindParam(':departmentID', $departmentID);
    $stmtUpdateDepartments->execute();
    //
    
    $sqlDeleteDepartment = "DELETE FROM departments WHERE departmentID = :departmentID";
    $stmtDeleteDepartment = $conn->prepare($sqlDeleteDepartment);
    $stmtDeleteDepartment->bindParam(':departmentID', $departmentID);
    $stmtDeleteDepartment->execute();
    header('Location: ' . DOMAIN . '/public/index.php?controller=homeadmin&action=qldv&msg=xoasuccess');
    exit();
}
