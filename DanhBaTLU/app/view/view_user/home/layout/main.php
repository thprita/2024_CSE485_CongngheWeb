<main>
    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $x =  isset($_GET['x']) ? $_GET['x'] : '';
    if ($action == 'qldv') {
        if ($x == 'info') {
            include APP_ROOT . '/app/view/view_user/department/info.php';
        } else {
            include APP_ROOT . '/app/view/view_user/department/lietke   /lietke.php';
        }
    } else if ($action == 'qlnv') {
        if ($x == 'info') {
            include APP_ROOT . '/app/view/view_user/employees/info.php';
        } else {
            include APP_ROOT . '/app/view/view_user/employees/lietke/lietke.php';
        }
    } else if ($action == 'gt') {
        include APP_ROOT . '/app/view/view_user/introduce/index.php';
    } else if ($action == 'user') {
        if ($x == 'xuly') {
            include APP_ROOT . '/app/view/view_user/user/xuly.php';
        } else {
            include APP_ROOT . '/app/view/view_user/user/index.php';
        }
    } else if ($action == 'lh') {
        include APP_ROOT . '/app/view/view_user/contact/index.php';
    } 
    else if ($action == 'timkiem') {
        include APP_ROOT . '/app/view/view_user/search/index.php';
    } else {
        include APP_ROOT . '/app/view/view_user/home/layout/dashboad.php';
    }

    ?>
</main>