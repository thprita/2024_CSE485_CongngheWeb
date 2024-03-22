<div class="row">
        <h3 class="text-danger text-center" style="margin-top:10px">DANH SÁCH ĐƠN VỊ</h3>
        <?php $i = 0; ?>
        <?php foreach ($currentPageItems as $i => $department) : ?>
            <div class="col-md-4 mt-3">
                <div class="card">
                <img src="<?= DOMAIN . '/public/img/' . $department->getLogo(); ?>" class="card-img-top" alt="..." width="100px" height="170px">
                    <div class="card-body">
                        <h5 class="card-title"><?= $department->getDepartmentName(); ?></h5>
                        <p class="card-text">Email: <?= $department->getEmail(); ?></p>
                        <p class="card-text">Địa chỉ: <?= $department->getAddress(); ?></p>
                        <p class="card-text">Phone: <?= $department->getPhone(); ?></p>
                        <p class="card-text">Website: <?= $department->getWebsite(); ?></p>
                        <a href="?controller=home&action=qldv&x=info&id=<?= $department->getDepartmentID() ?>" class="btn btn-danger">Xem chi tiết</a>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>