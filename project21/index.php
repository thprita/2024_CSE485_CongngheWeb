<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Document</title>
</head>
<body>
<?php
// Mảng chứa dữ liệu sản phẩm (giả sử đã có từ trước)
$products = [
    ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 15, 'image_link' => 'assets/img/image1.png'],
    ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 16, 'image_link' => 'assets/img/image2.png'],
    ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 17, 'image_link' => 'assets/img/image3.png'],
    ['id' => 4, 'name' => 'Sản phẩm 4', 'price' => 18, 'image_link' => 'assets/img/image4.png'],
    ['id' => 5, 'name' => 'Sản phẩm 5', 'price' => 19, 'image_link' => 'assets/img/image1.png'],
    ['id' => 6, 'name' => 'Sản phẩm 6', 'price' => 15, 'image_link' => 'assets/img/image2.png'],
    ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 15, 'image_link' => 'assets/img/image1.png'],
    ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 16, 'image_link' => 'assets/img/image2.png'],
    ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 17, 'image_link' => 'assets/img/image3.png'],
    ['id' => 4, 'name' => 'Sản phẩm 4', 'price' => 18, 'image_link' => 'assets/img/image4.png'],
    ['id' => 5, 'name' => 'Sản phẩm 5', 'price' => 19, 'image_link' => 'assets/img/image1.png'],
    ['id' => 6, 'name' => 'Sản phẩm 6', 'price' => 15, 'image_link' => 'assets/img/image2.png'],
    ['id' => 1, 'name' => 'Sản phẩm 1', 'price' => 15, 'image_link' => 'assets/img/image1.png'],
    ['id' => 2, 'name' => 'Sản phẩm 2', 'price' => 16, 'image_link' => 'assets/img/image2.png'],
    ['id' => 3, 'name' => 'Sản phẩm 3', 'price' => 17, 'image_link' => 'assets/img/image3.png'],
    ['id' => 4, 'name' => 'Sản phẩm 4', 'price' => 18, 'image_link' => 'assets/img/image4.png'],
    ['id' => 5, 'name' => 'Sản phẩm 5', 'price' => 19, 'image_link' => 'assets/img/image1.png'],
    ['id' => 6, 'name' => 'Sản phẩm 6', 'price' => 15, 'image_link' => 'assets/img/image2.png'],
    // Thêm các sản phẩm khác vào đây
];

$itemsPerPage = 4;
$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$totalPages = ceil(count($products) / $itemsPerPage);
$currentPageItems = array_slice($products, ($currentPage - 1) * $itemsPerPage, $itemsPerPage);
?>

<div class="product-list">
    <?php foreach ($currentPageItems as $product): ?>
        <div class="product">
            <img src="<?php echo $product['image_link']; ?>" alt="<?php echo $product['name']; ?>">
            <h3><?php echo $product['name']; ?></h3>
            <p>Price: <?php echo $product['price']; ?></p>
        </div>
    <?php endforeach; ?>
</div>
<div class="pagination">
    <?php if ($currentPage > 1): ?>
        <a href="?page=<?php echo $currentPage - 1; ?>">Previous</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <?php if ($i == $currentPage): ?>
            <span class="active"><?php echo $i; ?></span>
        <?php else: ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endif; ?>
    <?php endfor; ?>
    <?php if ($currentPage < $totalPages): ?>
        <a href="?page=<?php echo $currentPage + 1; ?>">Next</a>
    <?php endif; ?>
</div>


</body>
</html>