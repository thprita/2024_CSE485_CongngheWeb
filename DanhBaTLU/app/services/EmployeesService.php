<?php
require_once APP_ROOT . '/app/models/Employees.php';
class EmployeesService
{
    public function getAllEmployees()
    {
        $dbConnect = new ConnectDB();
        $conn = $dbConnect->getConnectDB();
        if ($conn != null) {
            $sql = "SELECT *FROM employees ORDER BY fullname ASC";
            $stmt = $conn->query($sql);
            $employeess = [];
            while ($row = $stmt->fetch()) {
                $employees = new Employees(
                    $row['employeeID'],
                    $row['fullname'],
                    $row['email'],
                    $row['address'],
                    $row['mobilePhone'],
                    $row['positionemployees'],
                    $row['avatar'],
                    $row['departmentID']
                );

                $employeess[] = $employees;
            }
            return $employeess;
        }
    }
}
