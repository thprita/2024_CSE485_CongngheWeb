<main>
    <?php
    $action = isset($_GET['action']) ? $_GET['action'] : '';
    $x =  isset($_GET['x']) ? $_GET['x'] : '';
    if ($action == 'qldv') {
        if ($x == 'them') {
            include APP_ROOT . '/app/view/view_admin/department/add.php';
        } else if ($x == 'info') {
            include APP_ROOT . '/app/view/view_admin/department/info.php';
        } else if ($x == 'sua') {
            include APP_ROOT . '/app/view/view_admin/department/sua.php';
        } else if ($x == 'xuly') {
            include APP_ROOT . '/app/view/view_admin/department/xuly.php';
        } else {
            include APP_ROOT . '/app/view/view_admin/department/lietke.php';
        }
    } else if ($action == 'qlnv') {
        if ($x == 'them') {
            include APP_ROOT . '/app/view/view_admin/employees/add.php';
        } else if ($x == 'info') {
            include APP_ROOT . '/app/view/view_admin/employees/info.php';
        } else if ($x == 'sua') {
            include APP_ROOT . '/app/view/view_admin/employees/sua.php';
        } else if ($x == 'xuly') {
            include APP_ROOT . '/app/view/view_admin/employees/xuly.php';
        } else {
            include APP_ROOT . '/app/view/view_admin/employees/lietke.php';
        }
    } else if ($action == 'gt') {
        include APP_ROOT . '/app/view/view_admin/introduce/index.php';
    }
    else if ($action == 'lh') {
        include APP_ROOT . '/app/view/view_admin/contact/index.php';
    }
    else if ($action == 'user') {
        if ($x == 'them') {
            include APP_ROOT . '/app/view/view_admin/user/add.php';
        }else if ($x == 'lietke') {
            include APP_ROOT . '/app/view/view_admin/user/lietke.php';
        }else if ($x == 'xuly') {
            include APP_ROOT . '/app/view/view_admin/user/xuly.php';
        }else if ($x == 'info') {
            include APP_ROOT . '/app/view/view_admin/user/info.php';
        }else { 
            include APP_ROOT . '/app/view/view_admin/user/sua.php';
        }
    }  else if ($action == 'timkiem') {
        include APP_ROOT . '/app/view/view_admin/search/index.php';
    } else {
        include APP_ROOT . '/app/view/view_admin/home/layout/dashboad.php';
    }
    ?>
</main>