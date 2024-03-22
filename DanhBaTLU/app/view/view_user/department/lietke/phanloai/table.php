<div class="row">
        <h3 class="text-danger text-center" style="margin-top:10px">DANH SÁCH ĐƠN VỊ</h3>
        <?php $i = 0; ?>
        <table cellpadding="5" style="border:1px solid red">
            <thead>
                <tr class="text-center">
                    <th>STT</th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                    <th>Phone</th>
                    <th>Logo</th>
                    <th>Website</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <?php foreach ($currentPageItems as $i => $department) : ?>
                <tbody>
                    <tr class="text-center" style="border: 1px solid red">
                        <th><?= ($currentPage - 1) * $item + $i + 1 ?></th>
                        <td>
                            <?= $department->getDepartmentName(); ?>
                        </td>
                        <td>
                            <?= $department->getEmail(); ?>
                        </td>
                        <td>
                            <?= $department->getAddress(); ?>
                        </td>
                        <td>
                            <?= $department->getPhone(); ?>
                        </td>
                        <td>
                            <?php

                            echo '<img src="' . IMAGE . $department->getLogo() . '" alt="Lỗi" width="100px" height="120px">';

                            ?>
                        </td>
                        <td>
                            <?= $department->getWebsite(); ?>
                        </td>
                        <td class="text-center"><a href="?controller=home&action=qldv&x=info&id=<?= $department->getDepartmentID() ?>" class="btn btn-danger"><i class="bi bi-eye-fill"></i></a></td>
                    </tr>
                </tbody>
            <?php endforeach ?>
        </table>
    </div>
</div>