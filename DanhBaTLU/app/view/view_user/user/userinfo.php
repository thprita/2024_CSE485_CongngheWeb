<div class="row border ps-2">
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Chỉnh sửa tài khoản</h3>
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] === 'errorpass') {
                echo '<div class="alert alert-success" role="alert">Mật khẩu phải trùng nhau</div>';
            }
            ?>
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
                echo '<div class="alert alert-success" role="alert">Thao tác thành công!</div>';
            }
            ?>
            <form action="?controller=home&action=user&x=xuly" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                <div class="row">
                    <div class="col-5">Tài khoản</div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">Mật khẩu</div>
                    <div class="col-7">
                        <input type="password" class="form-control" name="password" value="<?= $user['password'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">Nhập lại mật khẩu</div>
                    <div class="col-7">
                        <input type="password" class="form-control" name="password1" value="<?= $user['password'] ?>">
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">Quyền</div>
                    <div class="col-7">
                        <select name="role" id="role">
                            <?php $array = array(); ?>
                            <?php foreach ($users as $userss) : ?>
                                <?php if (!in_array($userss->getRole(), $array)) : ?>
                                    <?php $array[] = $userss->getRole(); ?>
                                    <option value="<?php echo $userss->getRole(); ?>"><?php echo $userss->getRole(); ?></option>
                                <?php endif ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5">Thuộc nhân viên</div>
                    <div class="col-7">
                        <input type="text" class="form-control" name="employeeID" value="<?= $user['employeeID'] ?>" readonly>
                    </div>
                </div>
                <div class="row" style="margin-top:20px">
                    <button type="submit" class="btn btn-success" name="suauser">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>