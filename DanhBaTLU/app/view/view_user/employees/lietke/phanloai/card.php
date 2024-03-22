<div class="row card-employees">
    <h3 class="text-danger text-center" style="margin-top:10px">DANH SÁCH NHÂN VIÊN</h3>
    <?php
    if (isset($_GET['msg']) && $_GET['msg'] === 'xoasuccess') {
        echo '<div class="alert alert-success" role="alert">Xóa thành công !</div>';
    }
    ?>
    <?php foreach ($currentPageItems as $i => $employee) : ?>
        <div class="col-md-4 mt-3">
            <div class="card">
                <img src="<?= DOMAIN . '/public/img/' . $employee->getAvatar(); ?>" class="card-img-top" alt="..." width="100px" height="170px">
                <div class="card-body">
                    <h5 class="card-title"><?= $employee->getFullName(); ?></h5>
                    <p class="card-text">Email: <?= $employee->getEmail(); ?></p>
                    <p class="card-text">Địa chỉ: <?= $employee->getAddress(); ?></p>
                    <p class="card-text">Điện thoại: <?= $employee->getMobilePhone(); ?></p>
                    <p class="card-text">Vị trí: <?= $employee->getPositionEmployees(); ?></p>
                    <a href="?controller=home&action=qlnv&x=info&id=<?= $employee->getEmployeeId(); ?>" class="btn btn-danger">Xem chi tiết</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>