<div class="row border ps-2">
    <h2 class="text text-primary text-center">Thông tin nhân viên</h2>
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
        echo '<div class="alert alert-success" role="alert">Thao tác thành công!</div>';
    }
    ?>
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] === 'error') {
        echo '<div class="alert alert-danger" role="alert">Tên hoặc email đã trùng !</div>';
    }
    ?>
    
    <!-- Biểu mẫu sửa thông tin nhân viên -->
    <form action="?controller=home&action=user&x=xuly" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
        <div class="mb-3">
            <label for="fullname" class="form-label">Tên</label>
            <input type="text" class="form-control" name="fullname" value="<?= $employee['fullname']; ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" value="<?= $employee['email']; ?>">
        </div>
        <div class="mb-3">
            <label for="address" class="form-label">Địa chỉ</label>
            <input type="text" class="form-control" name="address" value="<?= $employee['address']; ?>">
        </div>
        <div class="mb-3">
            <label for="mobilePhone" class="form-label">Điện thoại di động</label>
            <input type="tel" class="form-control" name="mobilePhone" value="<?= $employee['mobilePhone']; ?>">
        </div>
        <div class="mb-3">
            <label for="avatar" class="form-label">Ảnh đại diện</label>
            <!-- Hiển thị ảnh đại diện hiện tại -->
            <?php if (isset($employee['avatar'])) : ?>
                <img src="<?= DOMAIN ?>/public/img/<?= $employee['avatar'] ?>" alt="Avatar" width="100">
            <?php else : ?>
                <p>Chưa có hình ảnh</p>
            <?php endif; ?>
            <!-- Cho phép chọn file mới để thay đổi ảnh đại diện -->
            <input type="file" id="avatar" name="avatar" accept="image/*">
            <!-- Lưu trữ ảnh đại diện hiện tại nếu có -->
            <?php if (isset($employee['avatar'])) : ?>
                <input type="hidden" name="current_avatar" value="<?= $employee['avatar'] ?>">
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="positionemployees" class="form-label">Vị trí</label>
            <input type="text" class="form-control" name="positionemployees" value="<?= $employee['positionemployees']; ?>">
        </div>
        <!-- Trường select để chọn phòng ban -->
        <div class="mb-3">
            <label for="departmentID" class="form-label">Phòng ban</label>
            <select class="form-select" name="departmentID">
                <?php foreach ($departments as $department) : ?>
                    <!-- Lựa chọn mặc định sẽ là phòng ban của nhân viên -->
                    <option value="<?= $department['departmentID']; ?>" <?= ($department['departmentID'] == $employee['departmentID']) ? 'selected' : ''; ?>>
                        <?= $department['departmentName']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <!-- Nút submit -->
        <button type="submit" class="btn btn-primary" style="margin-bottom: 20px; float: right" name="sua">Sửa</button>
    </form>

</div>