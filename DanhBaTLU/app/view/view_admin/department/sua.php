<?php
// Kiểm tra nếu có ID được chuyển từ URL
if (isset($_GET['id'])) {
    // Lấy ID từ URL
    $departmentID = $_GET['id'];

    // Thực hiện truy vấn để lấy thông tin đơn vị dựa trên ID
    $sql = "SELECT * FROM departments WHERE departmentID = :departmentID";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':departmentID', $departmentID);
    $stmt->execute();
    $department = $stmt->fetch();
    if ($department) {
?>
        <div class="container">
            <div class="container-fluid mt-2">
                <div class="row border ps-2">
                    <h2 class="text text-primary text-center">Sửa thông tin đơn vị</h2>
                    <?php
                    if (isset($_GET['msg']) && $_GET['msg'] === 'success') {
                        echo '<div class="alert alert-success" role="alert">Thao tác thành công!</div>';
                    }
                    if (isset($_GET['msg']) && $_GET['msg'] === 'error') {
                        echo '<div class="alert alert-danger" role="alert">Tên hoặc email đã trùng!</div>';
                    }
                    ?>
                    <form action="?controller=homeadmin&action=qldv&x=xuly" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $_GET['id']; ?>">
                        <div class="mb-3">
                            <label for="username" class="form-label">Tên</label>
                            <input type="text" class="form-control" name="username" value="<?= $department['departmentName']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" value="<?= $department['email']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Địa chỉ</label>
                            <input type="text" class="form-control" name="address" value="<?= $department['address']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">Điện thoại</label>
                            <input type="tel" class="form-control" name="mobile" value="<?= $department['phone']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="">Logo</label>
                            <?php if (isset($department['logo'])) : ?>
                                <img src="<?= DOMAIN ?>/public/img/<?= $department['logo'] ?>" alt="Logo" width="100">
                            <?php else : ?>
                                <p>Chưa có hình ảnh</p>
                            <?php endif; ?>
                            <label for="file">Thay đổi</label>
                            <input type="file" id="file" name="file" accept="image/*">
                            <?php if (isset($department['logo'])) : ?>
                                <input type="hidden" name="current_logo" value="<?= $department['logo'] ?>">
                            <?php endif; ?>
                        </div>
                        <div class=" mb-3">
                            <label for="website" class="form-label">Website</label>
                            <input type="text" class="form-control" name="website" value="<?= $department['website']; ?>">
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
                        <button type="submit" class="btn btn-primary " style="margin-bottom:20px; float:right" name="sua">Sửa</button>
                    </form>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Không tìm thấy đơn vị phù hợp.";
    }
} else {
    echo "ID đơn vị không được cung cấp.";
}
?>