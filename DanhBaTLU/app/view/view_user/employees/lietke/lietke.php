<?php
$countemployees = count($employeess);
$employeesArray = [];
foreach ($employeess as $employees) {
    $employeesArray[] = $employees;
}
$totalPages = ceil($countemployees / $item);
$currentPageItems = array_slice($employeesArray, ($currentPage - 1) * $item, $item);
$i = 0;
$isCardView = isset($_GET['x']) && $_GET['x'] === 'card';
?>
<div class="container-fluid mt-2">
    <div class="row">
        <!-- Hai thẻ a được bao quanh bởi một div và cách nhau -->
        <div class="d-flex justify-content-end">
            <a href="?controller=home&action=qlnv" class="me-3 fs-1"><i class="bi bi-table"></i></a>
            <a href="?controller=home&action=qlnv&x=card" class="fs-1"><i class="bi bi-credit-card-2-back-fill"></i></a>
        </div>
    </div>
    <?php
    if ($isCardView) {
        include APP_ROOT . '/app/view/view_user/employees/lietke/phanloai/card.php';
    } else {
        include APP_ROOT . '/app/view/view_user/employees/lietke/phanloai/table.php';
    }
    ?>

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
        <?php if ($currentPage > 1 && $isCardView)  : ?>
            <li class="page-item"><a class="page-link" href="?controller=home&action=qlnv&x=card&page=<?= $currentPage - 1 ?>">Trước</a></li>
        <?php elseif ($currentPage > 1) :?>
            <li class="page-item"><a class="page-link" href="?controller=home&action=qlnv&page=<?= $currentPage - 1 ?>">Trước</a></li>
        <?php endif ?>
        <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
            <?php if ($i == $currentPage) : ?>
                <li class="page-item"><a class="page-link active" href=""><?= $i; ?></a></li>
            <?php else : ?>
                <?php if ($isCardView) : ?>
                    <li class="page-item"><a class="page-link" href="?controller=home&action=qlnv&x=card&page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php else : ?>
                    <li class="page-item"><a class="page-link" href="?controller=home&action=qlnv&page=<?= $i; ?>"><?= $i; ?></a></li>
                <?php endif ?>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($currentPage < $totalPages && $isCardView) : ?>
            <li class="page-item"><a class="page-link" href="?controller=home&action=qlnv&x=card&page=<?= $currentPage + 1 ?>">Sau</a></li>
        <?php elseif ($currentPage < $totalPages) :?>
            <li class="page-item"><a class="page-link" href="?controller=home&action=qlnv&page=<?= $currentPage + 1 ?>">Sau</a></li>
        <?php endif ?>
    </ul>
</nav>

    </div>
</div>