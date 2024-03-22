<?php
class User
{
    private $username;
    private $password;
    private $role;
    private $employeeid;

    // Constructor
    public function __construct($username, $password, $role, $employeeid)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role = $role;
        $this->employeeid = $employeeid;
    }

    // Getter cho $username
    public function getUsername()
    {
        return $this->username;
    }

    // Setter cho $username
    public function setUsername($username)
    {
        $this->username = $username;
    }

    // Getter cho $password
    public function getPassword()
    {
        return $this->password;
    }

    // Setter cho $password
    public function setPassword($password)
    {
        $this->password = $password;
    }

    // Getter cho $role
    public function getRole()
    {
        return $this->role;
    }

    // Setter cho $role
    public function setRole($role)
    {
        $this->role = $role;
    }

    // Getter cho $employeeID
    public function getEmployeeID()
    {
        return $this->employeeid;
    }

    // Setter cho $employeeID
    public function setEmployeeID($employeeid)
    {
        $this->employeeid = $employeeid;
    }
}
