<?php

$employeesArray = [];
foreach ($employeess as $employees) {
    $employeesArray[] = $employees;
}
$totalPages = ceil($countemployees / $item);
$currentPageItems = array_slice($employeesArray, ($currentPage - 1) * $item, $item);
$i = 0;
?>
<div class="container-fluid mt-2">
    <div class="row">
        <h3 class="text-danger text-center" style="margin-top:10px">DANH SÁCH NHÂN VIÊN</h3>

        <h2> <a href="?controller=homeadmin&action=qlnv&x=them" class="btn btn-primary">Thêm</a></h2>
        <?php $i = 0; ?>
        <?php
        if (isset($_GET['msg']) && $_GET['msg'] === 'xoasuccess') {
            echo '<div class="alert alert-success" role="alert">Xóa thành công !</div>';
        }
        ?>
        <table cellpadding="5" style="border:1px solid red">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Điện thoại</th>
                    <th>Vị trí nhân viên</th>
                    <th>avatar</th>
                    <th colspan="3" class="text-center">Thao tác</th>
                </tr>
            </thead>
            <?php foreach ($currentPageItems as $i => $employees) : ?>
                <tbody>
                    <tr class="text-center" style="border: 1px solid red">
                        <th><?= ($currentPage - 1) * $item + $i + 1 ?></th>
                        <td>
                            <?= $employees->getFullName(); ?>
                        </td>
                        <td>
                            <?= $employees->getEmail(); ?>
                        </td>
                        <td>
                            <?= $employees->getAddress(); ?>
                        </td>
                        <td>
                            <?= $employees->getMobilePhone(); ?>
                        </td>

                        <td>
                            <?= $employees->getPositionEmployees(); ?>
                        <td>
                            <img src="<?= DOMAIN . '/public/img/' . $employees->getAvatar(); ?>" alt="" width="100px" height="120px">
                        </td>
                        </td>
                        <td><a href="?controller=homeadmin&action=qlnv&x=info&id=<?= $employees->getEmployeeId() ?>" class="btn btn-danger"><i class="bi bi-eye-fill"></i></a></td>
                        <td><a href="?controller=homeadmin&action=qlnv&x=sua&id=<?= $employees->getEmployeeId() ?>" class="btn btn-primary"><i class="bi bi-pencil-fill"></i></a></td>
                        <td><a href="?controller=homeadmin&action=qlnv&x=xuly&id=<?= $employees->getEmployeeId() ?>" class="btn btn-success"><i class="bi bi-trash3-fill"></i></a></td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="d-flex align-items-center" style="margin-top:30px">
            <div class="flex-grow-1 ms-3">
                <h6 class="mt-0">Showing <?= count($currentPageItems) ?> Out of <?= $countemployees ?></h6>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <nav aria-label="Page navigation example" style="margin-top:30px">
            <ul class="pagination justify-content-end">
                <?php if ($currentPage > 1) : ?>
                    <li class="page-item"><a class="page-link" href="?controller=homeadmin&action=qlnv&page=<?= $currentPage - 1 ?>">Trước</a></li>
                <?php endif ?>
                <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
                    <?php if ($i == $currentPage) : ?>
                        <li class="page-item"><a class="page-link active" href=""><?= $i; ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?controller=homeadmin&action=qlnv&page=<?= $i; ?>"><?= $i; ?></a></li>
                    <?php endif; ?>
                <?php endfor; ?>
                <?php if ($currentPage < $totalPages) : ?>
                    <li class="page-item"><a class="page-link" href="?controller=homeadmin&action=qlnv&page=<?= $currentPage + 1 ?>">Sau</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
</div>