<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 border p-3 userInfo">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql_account = "SELECT * FROM users WHERE  username = :id";
                $stmt_account = $conn->prepare($sql_account);
                $stmt_account->bindParam(':id', $id);
                $stmt_account->execute();
                $user = $stmt_account->fetch();
                if ($user) {
            ?>
                    <div class="card">
                        <div class="card-body ">
                            <h3 class="card-title ">Tài khoản nhân viên</h3>
                            <div class="row">
                                <div class="col-5">Tài khoản</div>
                                <div class="col-7"><?= $user['username'] ?></div>
                            </div>
                            <!-- <div class="row">
                                <div class="col-5">Mật khẩu</div>
                                <div class="col-7"><?= $user['password'] ?></div>
                            </div> -->
                            <div class="row">
                                <div class="col-5">Quyền</div>
                                <div class="col-7"><?= $user['role'] ?></div>
                            </div>
                            <div class="row">
                                <div class="col-5">Thuộc nhân viên</div>
                                <div class="col-7"><?= $user['employeeID'] ?></div>
                            </div>
                        </div>
                    </div>
            <?php }
            }
            ?>
        </div>
    </div>
</div>