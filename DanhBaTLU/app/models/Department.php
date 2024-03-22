<?php
class Department
{
    private $departmentID;
    private $departmentName;
    private $address;
    private $email;
    private $phone;
    private $logo;
    private $website;
    private $parentDepartmentID;

    // Constructor
    public function __construct($departmentID, $departmentName, $address, $email, $phone, $logo = null, $website = null, $parentDepartmentID = null)
    {
        $this->departmentID = $departmentID;
        $this->departmentName = $departmentName;
        $this->address = $address;
        $this->email = $email;
        $this->phone = $phone;
        $this->logo = $logo;
        $this->website = $website;
        $this->parentDepartmentID = $parentDepartmentID;
    }

    // Getter và setter cho departmentID
    public function getDepartmentID()
    {
        return $this->departmentID;
    }

    public function setDepartmentID($departmentID)
    {
        $this->departmentID = $departmentID;
    }

    // Getter và setter cho departmentName
    public function getDepartmentName()
    {
        return $this->departmentName;
    }

    public function setDepartmentName($departmentName)
    {
        $this->departmentName = $departmentName;
    }

    // Getter và setter cho address
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    // Getter và setter cho email
    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    // Getter và setter cho phone
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    // Getter và setter cho logo
    public function getLogo()
    {
        return $this->logo;
    }

    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    // Getter và setter cho website
    public function getWebsite()
    {
        return $this->website;
    }

    public function setWebsite($website)
    {
        $this->website = $website;
    }

    // Getter và setter cho parentDepartmentID
    public function getParentDepartmentID()
    {
        return $this->parentDepartmentID;
    }

    public function setParentDepartmentID($parentDepartmentID)
    {
        $this->parentDepartmentID = $parentDepartmentID;
    }
}
