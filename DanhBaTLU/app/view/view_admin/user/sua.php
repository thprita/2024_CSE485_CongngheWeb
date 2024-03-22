<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center text-danger">Đổi pass</h2>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] === 'passerror') {
                    echo '<div class="alert alert-anger" role="alert">Pass cũ sai</div>';
                }
                ?>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] === 'errorpass') {
                    echo '<div class="alert alert-danger" role="alert">Pass mới không trùng nhau</div>';
                }
                ?>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
                    echo '<div class="alert alert-success" role="alert">Đổi pass thành công</div>';
                }
                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM users WHERE username = :id ";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $user = $stmt->fetch();
                    if ($user) { ?>
                        <div class="card-body">
                            <form action="?controller=homeadmin&action=user&x=xuly" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu cũ</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password1" class="form-label">Mật khẩu mới</label>
                                    <input type="password" class="form-control" id="password1" name="password1" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password2" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="password2" name="password2" required>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary " style="float:right" name="doipass">Đổi</button>
                                </div>


                            </form>
                        </div>
                    <?php } else { ?>

                <?php }
                }
                ?>
            </div>
        </div>
    </div>
</div>