<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h2 class="text-center text-danger">Tạo tài khoản nhân viên</h2>
                </div>
                <?php
                if (isset($_GET['msg']) && $_GET['msg'] === 'error') {
                    echo '<div class="alert alert-success" role="alert">Tài khoản đã được sử dụng</div>';
                }
                ?>
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM employees WHERE employeeID = :id ";
                    $stmt = $conn->prepare($sql);
                    $stmt->bindParam(':id', $id);
                    $stmt->execute();
                    $employee = $stmt->fetch();
                    if ($employee) { ?>
                        <div class="card-body">
                            <form action="?controller=homeadmin&action=user&x=xuly" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Tên tài khoản</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Mật khẩu</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Nhập lại mật khẩu</label>
                                    <input type="password" class="form-control" id="password1" name="password1" required>
                                </div>
                                <div class="mb-3">
                                    <select name="role" id="role">
                                        <?php $array = array(); ?>
                                        <?php foreach ($users as $user) : ?>
                                            <?php if (!in_array($user->getRole(), $array)) : ?>
                                                <?php $array[] = $user->getRole(); ?>
                                                <option value="<?php echo $user->getRole(); ?>"><?php echo $user->getRole(); ?></option>
                                            <?php endif ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="idnhanvien" class="form-label">ID nhân viên</label>
                                    <input type="text" class="form-control" id="idnhanvien" name="idnhanvien" value="<?= $employee['employeeID'] ?>" readonly>
                                </div>
                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary " style="float:right" name="add">Tạo</button>
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