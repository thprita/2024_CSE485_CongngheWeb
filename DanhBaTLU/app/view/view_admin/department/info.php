<div class="row justify-content-center">
    <div class="col-md-6 border p-3">
        <?php
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM departments WHERE departmentID = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $department = $stmt->fetch();
            if ($department) {
        ?>
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Thông tin đơn vị</h3>
                        <div class="row">
                            <div class="col-5">ID Đơn vị:</div>
                            <div class="col-7"><?= $department['departmentID'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">Tên Đơn vị:</div>
                            <div class="col-7"><?= $department['departmentName'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">Email Đơn vị:</div>
                            <div class="col-7"><?= $department['email'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">Địa chỉ Đơn vị:</div>
                            <div class="col-7"><?= $department['address'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">Số điện thoại Đơn vị:</div>
                            <div class="col-7"><?= $department['phone'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">Website Đơn vị:</div>
                            <div class="col-7"><?= $department['website'] ?></div>
                        </div>
                        <div class="row">
                            <div class="col-5">Logo Đơn vị:</div>
                            <div class="col-7"><img src="<?= DOMAIN . '/public/img/' . $department['logo'] ?>" alt="Lỗi" width="100px"></div>
                        </div>
                    </div>
                </div>
        <?php
            } else {
                echo "Không tìm thấy đơn vị có ID là $id";
            }
        }
        ?>
    </div>
</div>