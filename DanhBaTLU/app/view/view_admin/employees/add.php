<div class="container">
    <div class="container-fluid mt-2">
        <div class="row border ps-2">
            <h2 class="text text-primary text-center">Thêm thông tin nhân viên</h2>
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
                echo '<div class="alert alert-success" role="alert">Thao tác thành công!</div>';
            }
            ?>
            <?php
            if (isset($_GET['msg']) && $_GET['msg'] === 'error') {
                echo '<div class="alert alert-danger" role="alert">Tên hoạc email đã trùng !</div>';
            }
            ?>
            <form action="?controller=homeadmin&action=qlnv&x=xuly" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="fullname" class="form-label">Tên</label>
                    <input type="text" class="form-control" name="fullname">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <label for="mobilePhone" class="form-label">Điện thoại di động</label>
                    <input type="tel" class="form-control" name="mobilePhone">
                </div>
                <div class="mb-3">
                    <label for="avatar" class="form-label">Ảnh đại diện</label>
                    <input type="file" id="avatar" name="avatar" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="positionemployees" class="form-label">Vị trí</label>
                    <input type="text" class="form-control" name="positionemployees">
                </div>
                <!-- Trường select để chọn phòng ban -->
                <div class="mb-3">
                    <label for="departmentID" class="form-label">Phòng ban</label>
                    <select class="form-select" name="departmentID">
                        <?php foreach ($departments as $department) : ?>
                            <option value="<?= $department->getDepartmentID() ?>">
                                <?= $department->getDepartmentName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <!-- Nút submit -->
                <button type="submit" class="btn btn-primary" style="margin-bottom: 20px; float: right" name="add">Tạo</button>
            </form>
        </div>
    </div>
</div>