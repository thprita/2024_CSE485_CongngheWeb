<div class="row table-employees">
    <h3 class="text-danger text-center" style="margin-top:10px">DANH SÁCH NHÂN VIÊN</h3>
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
                        <img src="<?= DOMAIN . '/public/img/' . $employees->getAvatar(); ?>" alt="Lỗi" width="100px" height="120px">
                    </td>
                    </td>
                    <td><a href="?controller=home&action=qlnv&x=info&id=<?= $employees->getEmployeeId() ?>" class="btn btn-danger"><i class="bi bi-eye-fill"></i></a></td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>

</div>