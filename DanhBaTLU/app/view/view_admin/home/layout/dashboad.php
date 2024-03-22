<div class="container-fluid mt-2">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <img src="<?= IMAGE . 'image.jpg'; ?>" class="card-img-top" alt="Ảnh 3">
                <div class="card-body">
                    <h5 class="card-title">Số tin tức</h5>
                    <p class="">20</p>
                    <a href="#" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="<?= IMAGE . 'image.jpg'; ?>" class="card-img-top" alt="Ảnh 3">
                <div class="card-body">
                    <h5 class="card-title">Số đơn vị</h5>
                    <p class="card-text"><?= $countdepartment; ?></p>
                    <a href="?controller=homeadmin&action=qldv" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="<?= IMAGE . 'image.jpg'; ?>" class="card-img-top" alt="Ảnh 3">
                <div class="card-body">
                    <h5 class="card-title">Số nhân viên</h5>
                    <p class="card-text"><?= $countemployees; ?></p>
                    <a href="?controller=homeadmin&action=qlnv" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <img src="<?= IMAGE . 'image.jpg'; ?>" class="card-img-top" alt="Ảnh 3">
                <div class="card-body">
                    <h5 class="card-title">Số tài khoản</h5>
                    <p class="card-text"><?= $countuser; ?></p>
                    <a href="?controller=homeadmin&action=user&x=lietke" class="btn btn-primary">Chi tiết</a>
                </div>
            </div>
        </div>
    </div>
</div>