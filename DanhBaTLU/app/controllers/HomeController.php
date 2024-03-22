<?php
require_once APP_ROOT . '/app/services/DepartmentService.php';
require_once APP_ROOT . '/app/services/EmployeesService.php';
class HomeController
{
    public function index()
    {
        $departmentservice = new DepartmentService();
        $departments = $departmentservice->getAllDepartment();
        $employeesservice = new EmployeesService();
        $employeess = $employeesservice->getAllEmployees();
        $dbConnect = new ConnectDB();
        $conn = $dbConnect->getConnectDB();
        $userservice = new UserService();
        $users = $userservice->getAllUser();
        include APP_ROOT . '/app/view/view_user/home/index.php';
    }
    public function indexadmin()
    {

        $departmentservice = new DepartmentService();
        $departments = $departmentservice->getAllDepartment();
        $employeesservice = new EmployeesService();
        $employeess = $employeesservice->getAllEmployees();
        $dbConnect = new ConnectDB();
        $conn = $dbConnect->getConnectDB();
        $userservice = new UserService();
        $users = $userservice->getAllUser();
        include APP_ROOT . '/app/view/view_admin/home/index.php';
    }
}
