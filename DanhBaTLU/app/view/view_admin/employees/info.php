<div class="container">
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
                        <?php
                        if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
                            echo '<div class="alert alert-success" role="alert">Tài khoản đã được thêm</div>';
                        }
                        ?>
                        <div class="card-body">
                            <h3 class="card-title">Thông tin nhân viên</h3>
                            <div class="row">
                                <div class="col-5">ID nhân viên:</div>
                                <div class="col-7"><?= $employee['employeeID'] ?></div>
                            </div>
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
                            <div class="row">
                                <div class="col-5">Thông tin tài khoản</div>
                                <div class="col-7 btn btn-success userxem" onclick="showUserInfo()">Xem</div>
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
        <div class="col-md-6 border p-3 userInfo" style="display:none">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql_account = "SELECT * FROM users WHERE employeeID = :id";
                $stmt_account = $conn->prepare($sql_account);
                $stmt_account->bindParam(':id', $id);
                $stmt_account->execute();
                $user = $stmt_account->fetch();
                if ($user) {
            ?>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Tài khoản nhân viên</h3>
                            <div class="row">
                                <div class="col-5">Tài khoản:</div>
                                <div class="col-7"><?= $user['username'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-5">Mật khẩu:</div>
                                <div class="col-7"><?= $user['password'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-5">Quyền:</div>
                                <div class="col-7"><?= $user['role'] ?></div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Tài khoản nhân viên</h3>
                            <div class="col-7 btn">
                                <?php echo 'Nhân viên chưa có tài khoản' ?>
                                <a class="btn btn-success" href="?controller=homeadmin&action=user&x=them&id=<?= $employee['employeeID'] ?>">Tạo</a>
                            </div>
                        </div>
                <?php }
            }
                ?>
                    </div>
        </div>
    </div>