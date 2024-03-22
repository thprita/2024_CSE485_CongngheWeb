<?php
require_once APP_ROOT . '/app/models/User.php';
class UserService
{
    public function getAllUser()
    {
        $dbConnect = new ConnectDB();
        $conn = $dbConnect->getConnectDB();
        if ($conn != null) {
            $sql = "SELECT *FROM users";
            $stmt = $conn->query($sql);
            $users = [];
            while ($row = $stmt->fetch()) {
                $user = new User(
                    $row['username'],
                    $row['password'],
                    $row['role'],
                    $row['employeeID'],
                );
                $users[] = $user;
            }
            return $users;
        }
    }
}
