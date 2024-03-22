<?php
require_once('../app/config/config.php');
require_once APP_ROOT . '/app/libs/ConnectDB.php';
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'home';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
require_once APP_ROOT . '/app/controllers/HomeController.php';
$homecontroller = new HomeController();
require_once APP_ROOT . '/app/controllers/Login_SignupController.php';
$logincontroller = new Login_SignupController();
if ($controller == 'home') {
    $homecontroller->index();
} else if ($controller == 'homeadmin') {
    $homecontroller->indexadmin();
} else if ($controller == 'login') {
    if ($action == 'xuly') {
        $logincontroller->xuly();
    } else {
        $logincontroller->index();
    }
} else if ($controller == 'logout') {
    $logincontroller->logout();
} else if ($controller == 'signup') {
    $logincontroller->signup();
} else {
    echo 'Không tồn tại';
}
