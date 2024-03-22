<header>
    <div class="logo" style="width: 100%; height: 150px; overflow: hidden;">
        <img src="<?= IMAGE . 'logo.jpg' ?>" alt="Tracuudanhba Logo" style="width: 100%; height: 100%; object-fit: cover;">
    </div>
    <nav class="navbar navbar-expand-lg custom-navbar">
        <div class="container-fluid">
            <a class="navbar-brand text-primary fs-4" href="?controller=homeadmin">Tracuudanhba</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=homeadmin">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=homeadmin&action=gt">Giới thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=homeadmin&action=qldv">Quản lý đơn vị</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=homeadmin&action=qlnv">Quản lý nhân viên</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?controller=homeadmin&action=lh">Liên hệ</a>
                    </li>
                </ul>
            </div>
            <div>
                <!-- <i class="bi bi-lightbulb-fill fs-3 btn" id="lightbulb"></i> -->
                <?php if (isset($_SESSION['user_id']) && isset($_SESSION['user'])) : ?>
                    <a href="?controller=homeadmin&action=qlnv&x=sua&id=<?= $_SESSION['user']; ?>" class="btn btn-primary">Tài khoản: <?= $_SESSION['user_id']; ?></a>
                    <a href="?controller=logout" class="btn btn-primary">Đăng xuất</a>
                <?php endif ?>
            </div>
        </div>
    </nav>
    <div class="row b" style="margin:10px 0px;">
        <div class="col">
            <form action="?controller=homeadmin&action=timkiem" method="post">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nhập từ khóa..." name="tukhoa">
                    <input type="submit" name="timkiem" class="btn btn-success" value="Tìm kiếm" style="min-width:300px">
                </div>
            </form>

        </div>
    </div>
</header>