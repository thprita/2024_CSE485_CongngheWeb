
<div class="row justify-content-center">
    <div class="col-md-6 border p-3">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM employees WHERE employeeID = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $employee = $stmt->fetch();
            if ($employee) {
        ?>
            <div class="card">
                <div class="card-body">
                <h3 class="card-title">Thông tin nhân viên</h3>
                <div class="row">
                    <div class="col-5">Tên nhân viên:</div>
                    <div class="col-7"><?= $employee['fullname'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Email:</div>
                    <div class="col-7"><?= $employee['email'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Địa chỉ:</div>
                    <div class="col-7"><?= $employee['address'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Điện thoại di động:</div>
                    <div class="col-7"><?= $employee['mobilePhone'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Vị trí:</div>
                    <div class="col-7"><?= $employee['positionemployees'] ?></div>
                </div>
                <div class="row">
                    <div class="col-5">Ảnh đại diện:</div>
                    <div class="col-7"><img src="<?= DOMAIN . '/public/img/' . $employee['avatar'] ?>" alt="Lỗi" width="100px"></div>
                </div>
                <div class="row">
                    <div class="col-5">Trực đơn vị:</div>
                    <div class="col-7"><?= $employee['departmentID'] ?></div>
                </div>
            </div>
            </div>
        <?php
            } else {
                echo "Không tìm thấy nhân viên có ID là $id";
            }
        }
        ?>
    </div>
</div>
