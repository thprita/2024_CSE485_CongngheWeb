<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>
    <style>
        /* Thêm các định kiểu CSS của bạn ở đây */
        .course {
            background-color: #f9f9f9;
            padding: 10px;
            margin-bottom: 20px;
            float: left; /* Đặt các phần tử khóa học vào cùng một hàng */
            width: calc(33.33% - 20px); /* 33.33% để chia thành 3 cột, trừ đi khoảng cách margin */
            margin-right: 20px;
            margin-right: 20px;
            margin-bottom: 20px;
        }
        .course:nth-child(3n) {
            margin-right: 0; /* Loại bỏ margin bên phải của phần tử thứ 3, 6... để không bị tràn xuống dòng mới */
        }
        .course h2 {
            color: #333;
        }
        .course p {
            color: #666;
        }
        .section-title {
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 10px;
            clear: both; /* Đảm bảo rằng tiêu đề section không lấn qua các phần tử trước đó */
        }
    </style>
</head>
<body>
<?php
// Dữ liệu khóa học lưu động trong mảng
$courses = [
    [
        'title' => 'Học viên quốc tế',
        'description' => 'Chương trình đào tạo chính thức tại Việt Nam từ
Aptech Global. Phát triển nghề nghiệp sinh viên IT như một lập trình viên 
quốc tế.',
        'fee' => '15.000.000 VND',
        'start_date' => '2/2/24',
        'duration' => '2 - 2.5 năm'
    ],
    // Thêm các khóa học khác vào đây
];
?>
<div class="section-title">DANH SÁCH KHÓA HỌC</div>
<?php
// Hiển thị danh sách khóa học
foreach ($courses as $index => $course) {
    echo '<div class="course">';
    echo '<h2>' . $course['title'] . '</h2>';
    echo '<p>' . $course['description'] . '</p>';
    echo '<p>Học phí: ' . $course['fee'] . '</p>';
    echo '<p>Khải giảng: ' . $course['start_date'] . '</p>';
    echo '<p>Thời lượng: ' . $course['duration'] . '</p>';
    echo '</div>';
    // Kiểm tra xem đã hiển thị 3 khóa học, nếu có thì thêm clear:both để tiếp tục hiển thị ở dòng mới
    if (($index + 1) % 3 === 0) {
        echo '<div style="clear:both;"></div>';
    }
}
?>
</body>
</html>
