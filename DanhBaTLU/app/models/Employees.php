<?php
class Employees {
    private $employeeId;
    private $fullName;
    private $email;
    private $address;
    private $mobilePhone;
    private $positionEmployees;
    private $avatar;
    private $departmentId;

    public function __construct($employeeId, $fullName, $email, $address, $mobilePhone, $positionEmployees, $avatar, $departmentId) {
        $this->employeeId = $employeeId;
        $this->fullName = $fullName;
        $this->email = $email;
        $this->address = $address;
        $this->mobilePhone = $mobilePhone;
        $this->positionEmployees = $positionEmployees;
        $this->avatar = $avatar;
        $this->departmentId = $departmentId;
    }
    public function getEmployeeId() {
        return $this->employeeId;
    }

    public function getFullName() {
        return $this->fullName;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getMobilePhone() {
        return $this->mobilePhone;
    }

    public function getPositionEmployees() {
        return $this->positionEmployees;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    public function getDepartmentId() {
        return $this->departmentId;
    }
    public function setFullName($fullName) {
        $this->fullName = $fullName;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setMobilePhone($mobilePhone) {
        $this->mobilePhone = $mobilePhone;
    }

    public function setPositionEmployees($positionEmployees) {
        $this->positionEmployees = $positionEmployees;
    }

    public function setAvatar($avatar) {
        $this->avatar = $avatar;
    }

    public function setDepartmentId($departmentId) {
        $this->departmentId = $departmentId;
    }
}

