<?php
require_once APP_ROOT . '/app/services/UserService.php';
class Login_SignupController
{

    public function index()
    {
        $userservice = new UserService();
        $users = $userservice->getAllUser();
        include APP_ROOT . '/app/view/login-signup/login.php';
    }
    public function xuly()
    {
        $dbConnect = new ConnectDB();
        $conn = $dbConnect->getConnectDB();
        include APP_ROOT . '/app/view/login-signup/xuly.php';
    }
    public function signup()
    {
        $userservice = new UserService();
        $users = $userservice->getAllUser();
        include APP_ROOT . '/app/view/login-signup/signup.php';
    }
    public function logout()
    {
        $userservice = new UserService();
        $users = $userservice->getAllUser();
        include APP_ROOT . '/app/view/login-signup/login.php';
    }
}
