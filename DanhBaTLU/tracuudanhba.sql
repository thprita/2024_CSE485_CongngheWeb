-- Tạo bảng Departments
CREATE TABLE departments (
    departmentID INT(6) AUTO_INCREMENT PRIMARY KEY,
    departmentName VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    logo VARCHAR(255) DEFAULT NULL,
    website VARCHAR(255) DEFAULT NULL,
    parentDepartmentID INT(6) DEFAULT NULL,
    FOREIGN KEY (parentDepartmentID) REFERENCES departments(departmentID)
);

-- Tạo bảng Employees
CREATE TABLE employees (
    employeeID INT(6) AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mobilePhone VARCHAR(20) NOT NULL,
    positionemployees VARCHAR(100) NOT NULL,
    avatar VARCHAR(255) DEFAULT NULL,
    departmentID INT(6) DEFAULT NULL,
    FOREIGN KEY (departmentID) REFERENCES departments(departmentID)
);

-- Tạo bảng Users
CREATE TABLE users (
    username VARCHAR(50) PRIMARY KEY,
    password VARCHAR(255) NOT NULL,
    role ENUM('admin', 'regular') NOT NULL,
    employeeID INT(6) DEFAULT NULL,
    FOREIGN KEY (employeeID) REFERENCES employees(employeeID)
);

-- Chèn dữ liệu vào bảng Departments
INSERT INTO departments (departmentName, address, email, phone, logo, website, parentDepartmentID)
VALUES 
    ('Department 1', 'Address 1', 'email1@example.com', '123456789', 'logo1.jpg', 'website1.com', NULL),
    ('Department 2', 'Address 2', 'email2@example.com', '987654321', 'logo2.jpg', 'website2.com', NULL),
    ('Department 3', 'Address 3', 'email3@example.com', '111222333', 'logo3.jpg', 'website3.com', NULL),
    ('Department 4', 'Address 4', 'email4@example.com', '444555666', 'logo4.jpg', 'website4.com', 1),
    ('Department 5', 'Address 5', 'email5@example.com', '777888999', 'logo5.jpg', 'website5.com', 2),
    ('Department 6', 'Address 6', 'email6@example.com', '000111222', 'logo6.jpg', 'website6.com', 3),
    ('Department 7', 'Address 7', 'email7@example.com', '333444555', 'logo7.jpg', 'website7.com', 4),
    ('Department 8', 'Address 8', 'email8@example.com', '666777888', 'logo8.jpg', 'website8.com', 5),
    ('Department 9', 'Address 9', 'email9@example.com', '999000111', 'logo9.jpg', 'website9.com', 6),
    ('Department 10', 'Address 10', 'email10@example.com', '222333444', 'logo10.jpg', 'website10.com', 7);

-- Chèn dữ liệu vào bảng Employees
INSERT INTO employees (fullname, address, email, mobilePhone, positionemployees, avatar, departmentID)
VALUES
    ('Employee 1', 'Address 1', 'emp1@example.com', '1234567890', 'Position 1', 'avatar1.jpg', 1),
    ('Employee 2', 'Address 2', 'emp2@example.com', '9876543210', 'Position 2', 'avatar2.jpg', 2),
    ('Employee 3', 'Address 3', 'emp3@example.com', '1112223330', 'Position 3', 'avatar3.jpg', 3),
    ('Employee 4', 'Address 4', 'emp4@example.com', '4445556660', 'Position 4', 'avatar4.jpg', 4),
    ('Employee 5', 'Address 5', 'emp5@example.com', '7778889990', 'Position 5', 'avatar5.jpg', 5),
    ('Employee 6', 'Address 6', 'emp6@example.com', '0001112220', 'Position 6', 'avatar6.jpg', 6),
    ('Employee 7', 'Address 7', 'emp7@example.com', '3334445550', 'Position 7', 'avatar7.jpg', 7),
    ('Employee 8', 'Address 8', 'emp8@example.com', '6667778880', 'Position 8', 'avatar8.jpg', 8),
    ('Employee 9', 'Address 9', 'emp9@example.com', '9990001110', 'Position 9', 'avatar9.jpg', 9),
    ('Employee 10', 'Address 10', 'emp10@example.com', '2223334440', 'Position 10', 'avatar10.jpg', 10);

-- Chèn dữ liệu vào bảng Users
INSERT INTO users (username, password, role, employeeID)
VALUES
    ('user1', 'admin', 'admin', 1),
    ('user2', 'password2', 'regular', 2),
    ('user3', 'password3', 'admin', 3),
    ('user4', 'password4', 'regular', 4),
    ('user5', 'password5', 'admin', 5),
    ('user6', 'password6', 'regular', 6),
    ('user7', 'password7', 'admin', 7),
    ('user8', 'password8', 'regular', 8),
    ('user9', 'password9', 'admin', 9),
    ('user10', 'password10', 'regular', 10);
vietnamnet