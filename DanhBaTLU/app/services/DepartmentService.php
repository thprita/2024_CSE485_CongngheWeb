<?php

require_once APP_ROOT . '/app/models/Department.php';
class DepartmentService
{
    public function getAllDepartment()
    {
        $dbConnect = new ConnectDB();
        $conn = $dbConnect->getConnectDB();
        if ($conn != null) {
            $sql = 'SELECT *FROM departments ORDER BY departmentName ASC';
            $stmt = $conn->query($sql);
            $departments = [];
            while ($row = $stmt->fetch()) {
                $department = new Department(
                    $row['departmentID'],
                    $row['departmentName'],
                    $row['address'],
                    $row['email'],
                    $row['phone'],
                    $row['logo'],
                    $row['website'],
                    $row['parentDepartmentID']
                );
                $departments[] = $department;
            }
            return $departments;
        }
    }
}
