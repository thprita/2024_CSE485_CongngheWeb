<div class="container">
    <div class="container-fluid mt-2">
        <div class="row border ps-2">
            <h2 class="text text-primary text-center">Thêm đơn vị mới</h2>
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
            <form action="?controller=homeadmin&action=qldv&x=xuly" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="username" class="form-label">Tên</label>
                    <input type="text" class="form-control" name="username" required>

                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Địa chỉ</label>
                    <input type="text" class="form-control" name="address">
                </div>
                <div class="mb-3">
                    <label for="mobile" class="form-label">Điện thoại</label>
                    <input type="tel" class="form-control" name="mobile">

                </div>
                <div class="mb-3">
                    <label for="file">Logo</label>
                    <input type="file" id="file" name="file" accept="image/*">
                </div>
                <div class="mb-3">
                    <label for="website" class="form-label">Wesbite</label>
                    <input type="text" class="form-control" name="website">

                </div>
                <div class="mb-3">
                    <label for="departmentID" class="form-label">Bộ phận gốc</label>
                    <select class="form-select" name="departmentID">
                        <?php foreach ($departments as $department) : ?>
                            <option value="<?= $department->getDepartmentID() ?>">
                                <?= $department->getDepartmentName(); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <button type="submit" class="btn btn-primary " style="margin-bottom:20px; float:right" name="add">Thêm mới</button>
            </form>
        </div>
    </div>
</div>