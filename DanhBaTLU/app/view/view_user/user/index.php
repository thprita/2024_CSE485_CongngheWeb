<?php
// Kiểm tra nếu có ID được chuyển từ URL
if (isset($_GET['id'])) {
    // Lấy ID từ URL
    $employeeID = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin nhân viên dựa trên ID
    $sqlEmployee = "SELECT * FROM employees WHERE employeeID = :employeeID";
    $stmtEmployee = $conn->prepare($sqlEmployee);
    $stmtEmployee->bindParam(':employeeID', $employeeID);
    $stmtEmployee->execute();
    $employee = $stmtEmployee->fetch();

    // Thực hiện truy vấn để lấy danh sách phòng ban từ bảng departments
    $sqlDepartments = "SELECT * FROM departments";
    $stmtDepartments = $conn->prepare($sqlDepartments);
    $stmtDepartments->execute();
    $departments = $stmtDepartments->fetchAll();
    $sql_account = "SELECT * FROM users WHERE  employeeID = :employeeID";
    $stmt_account = $conn->prepare($sql_account);
    $stmt_account->bindParam(':employeeID', $employeeID);
    $stmt_account->execute();
    $user = $stmt_account->fetch();
    $check = isset($_GET['x']) && $_GET['x'] === 'tk';
?>
    <div class="container">
        <div class="container-fluid mt-2">
            <div class="top">
                <a class="btn btn-success" href="?controller=home&action=user&id=<?= $employeeID?>">Thông tin nhân viên</a>
                <a class="btn btn-success" href=" ?controller=home&action=user&x=tk&id=<?= $employeeID?>"> Tài khoản đăng nhập</a>
            </div>
            <?php
            if ($check) {
                include APP_ROOT . '/app/view/view_user/user/userinfo.php';
            } else {
                include APP_ROOT . '/app/view/view_user/user/employeeinfo.php';
            }
            ?>
                    
        </div>
    </div>
<?php
    // Kết thúc câu lệnh if kiểm tra ID từ URL
} else {
    echo "ID nhân viên không được cung cấp.";
}
?>