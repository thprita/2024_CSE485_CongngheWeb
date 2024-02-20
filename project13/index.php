<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khóa học</title>'
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
<div class="section-title">KHOÁ HỌC SẮP KHAI GIẢNG</div>
<?php
// Dữ liệu khóa học lưu động trong mảng
$courses = [
    [
        'title' => 'LẬP TRÌNH VIÊN QUỐC TẾ',
        'description' => 'Chương trình đào tạo chuẩn quốc tế và toàn diện. Phù hợp với học sinh tốt nghiệp THPT, sinh viên và người định hướng theo nghề lập trình chuyên nghiệp.',
        'fee' => '15.000.000 VND',
        'start_date' => '2/2024',
        'duration' => '2 - 2.5 năm'
    ],
    // Thêm các khóa học khác vào đây
    [
        'title' => 'LẬP TRÌNH WEB FULLSTACK',
        'description' => 'Khóa học phù hợp với người bắt đầu lập trình hoặc người chuyển nghề. Trang bị từ frontend đến backend, xây dựng website hoàn chỉnh sau khóa học.',
        'fee' => '15% học phí',
        'start_date' => '2/2024',
        'duration' => '6 tháng'
    ],
    [
        'title' => 'LẬP TRÌNH JAVA FULLSTACK',
        'description' => 'Phát triển ứng dụng web từ cơ bản đến nâng cao bằng Java, các ứng dụng doanh nghiệp sử dụng J2EE, Servlet, JSP, Spring Framework, EJB....',
        'fee' => '15% học phí',
        'start_date' => '2/2024',
        'duration' => '236 giờ'
    ],
    [
        'title' => 'LẬP TRÌNH PHP & LARAVEL',
        'description' => 'PHP là một trong các ngôn ngữ thiết kế web mạnh nhất. Khóa học trang bị kỹ năng xây dựng web hoàn chỉnh sử dụng PHP kết hợp Laravel Framework.',
        'fee' => '9.600.000 VND',
        'start_date' => '5/2/2024',
        'duration' => '36 giờ'
    ],
    [
        'title' => 'KHOÁ HỌC LẬP TRÌNH .NET',
        'description' => 'Phát triển ứng dụng web sử dụng nền tảng ASP.NET Core MVC. Để học tốt khóa học yêu cầu học viên đã có kiến thức C# và Frontend.',
        'fee' => '6.000.000 VND',
        'start_date' => '2/2024',
        'duration' => '40 giờ'
    ],
    [
        'title' => 'LẬP TRÌNH SQL SERVER',
        'description' => 'Trang bị những kiến thức nền tảng vững chắc về SQL Server như các kỹ thuật: lọc dữ liệu, phân tích, thiết kế và quản trị cơ sở dữ liệu....',
        'fee' => '4.500.000 VND',
        'start_date' => '2/2024',
        'duration' => '30 giờ'
    ],
];
$image = 'img/logo1.png';
?>

<?php
// Hiển thị danh sách khóa học
foreach ($courses as $course) {
    echo '<div class="course">';
    if ($course['title'] == 'LẬP TRÌNH VIÊN QUỐC TẾ'){
        echo "<img src='img/logo1.png' alt='image die'>";
    }elseif ($course['title'] == 'LẬP TRÌNH WEB FULLSTACK'){
        echo "<img src='img/logo2.png' alt='image die'>";
    }elseif ($course['title'] == 'LẬP TRÌNH JAVA FULLSTACK'){
        echo "<img src='img/logo3.png' alt='image die'>";
    }elseif ($course['title'] == 'LẬP TRÌNH PHP & LARAVEL'){
        echo "<img src='img/logo4.png' alt='image die'>";
    }elseif ($course['title'] == 'KHOÁ HỌC LẬP TRÌNH .NET'){
        echo "<img src='img/logo5.png' alt='image die'>";
    }elseif ($course['title'] == 'LẬP TRÌNH SQL SERVER'){
        echo "<img src='img/logo6.png' alt='image die'>";
    }

    echo '<h2>' . $course['title'] . '</h2>';
    echo '<p>' . $course['description'] . '</p>';
    if ($course['title'] == 'LẬP TRÌNH VIÊN QUỐC TẾ'){
        echo '<p><i class="fa-solid fa-gift"></i> Học bổng: ' . $course['fee'] . '</p>';
        echo '<p><i class="fa-solid fa-clock"></i> Khải giảng: ' . $course['start_date'] . '</p>';
        echo '<p><i class="fa-solid fa-bookmark"></i> Thời lượng: ' . $course['duration'] . '</p>';
    }
    elseif (($course['title'] == 'LẬP TRÌNH WEB FULLSTACK') || ($course['title'] == 'LẬP TRÌNH JAVA FULLSTACK')){
        echo '<p><i class="fa-solid fa-gift"></i> Ưu đãi giảm ' . $course['fee'] .'</p>';
        echo '<p><i class="fa-solid fa-clock"></i> Khải giảng: ' . $course['start_date'] . '</p>';
        echo '<p><i class="fa-solid fa-bookmark"></i> Thời lượng: ' . $course['duration'] . '</p>';
    }else{
        echo '<p><i class="fa-solid fa-clock"></i> Khai giảng: ' . $course['start_date'] .'</p>';
        if($course['title'] == 'LẬP TRÌNH PHP & LARAVEL' || $course['title'] == 'LẬP TRÌNH SQL SERVER'){
            echo '<p><i class="fa-solid fa-gift"></i> Học phí: ' . $course['fee'] . '</p>';
            echo '<p><i class="fa-solid fa-bookmark"></i> Thời lượng: ' . $course['duration'] . '</p>';
        }else{
            echo '<p><i class="fa-solid fa-bookmark"></i> Thời lượng: ' . $course['duration'] . '</p>';
            echo '<p><i class="fa-solid fa-gift"></i> Học phí: ' . $course['fee'] . '</p>';
        }
    }
    echo '</div>';
}
?>
</body>

</html>