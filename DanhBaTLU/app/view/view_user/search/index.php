<?php
// Xử lý yêu cầu tìm kiếm
if (isset($_POST['timkiem'])) {
    // Lấy từ khóa tìm kiếm từ form
    $tukhoa = $_POST['tukhoa'];

    // Thực hiện truy vấn tìm kiếm trong cơ sở dữ liệu
    // Ví dụ: Tìm kiếm đơn vị có tên chứa từ khóa
    $query = "SELECT * FROM departments WHERE departmentName LIKE :tukhoa";
    $stmt = $conn->prepare($query);
    $stmt->bindValue(':tukhoa', '%' . $tukhoa . '%');
    $stmt->execute();
    $departments = $stmt->fetchAll();

    $query_empolyees = "SELECT * FROM employees WHERE fullname LIKE :tukhoa";
    $stmt = $conn->prepare($query_empolyees);
    $stmt->bindValue(':tukhoa', '%' . $tukhoa . '%');
    $stmt->execute();
    $employees = $stmt->fetchAll();
?>
    <h3>Từ khóa tìm kiếm: <?php echo $_POST['tukhoa'] ?></h3>
    <div class="row">
        <?php foreach ($departments as $department) : ?>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="<?= DOMAIN . '/public/img/' . $department['logo'] ?>" class="card-img-top" alt="..." width="100px" height="170px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $department['departmentName'] ?></h5>
                        <p class="card-text">Email: <?= $department['email']; ?></p>
                        <p class="card-text">Email: <?= $department['email']; ?></p>
                        <p class="card-text">Địa chỉ: <?= $department['address'] ?></p>
                        <p class="card-text">email: <?= $department['email'] ?></p>
                        <p class="card-text">Điện thoại: <?= $department['phone'] ?></p>
                        <p class="card-text">Website: <?= $department['website'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
    <div class="row">
        <?php foreach ($employees as $employee) : ?>
            <div class="col-md-4 mt-3">
                <div class="card">
                    <img src="<?= DOMAIN . '/public/img/' . $employee['avatar']; ?>" class="card-img-top" alt="..." width="100px" height="170px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $employee['fullname']; ?></h5>
                        <p class="card-text">Email: <?= $employee['email'] ?></p>
                        <p class="card-text">Địa chỉ: <?= $employee['address'] ?></p>
                        <p class="card-text">Điện thoại: <?= $employee['mobilePhone'] ?></p>
                        <p class="card-text">Vị trí: <?= $employee['positionemployees'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
<?php
}
?>