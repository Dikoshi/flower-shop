<?php
require_once 'config/db.php';
include 'header.php'; // Подключение шапки

// Проверяем, есть ли параметр id в URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
    
    // Запрашиваем информацию о продукте по id
    $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$product_id]);
    $product = $stmt->fetch();
    
    if ($product) {
        // Продукт найден, выводим информацию
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title>Цветочный магазин - <?= htmlspecialchars($product['name']); ?></title>
            <link rel="stylesheet" href="css/style.css"> <!-- Общие стили -->
            <link rel="stylesheet" href="css/product.css"> <!-- Стили для страницы продукта -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

        </head>
        <body>  

            <main>
                <div class="container">
                    <div class="product">
                        <div class="product-image-container">
                            <img src="<?= $product['image']; ?>" alt="<?= htmlspecialchars($product['name']); ?>" class="product-image">
                        </div>
                        <div class="product-details">
                            <h1><?= htmlspecialchars($product['name']); ?></h1>
                            <p class="price"><?= $product['price']; ?> руб.</p>
                            <p class="description"><?= nl2br(htmlspecialchars($product['description'])); ?></p>
                            <a href="flower-shop/cart.php?add=<?= $product['id']; ?>" class="add-to-cart-btn">В корзину</a>
                        </div>
                    </div>
                </div>
            </main>
        </body>
        </html>
        <?php
    } else {
        // Продукт не найден, выводим сообщение
        echo "<p>Продукт не найден.</p>";
    }
    include 'footer.php'; // Подключение подвала
} else {
    echo "<p>Некорректный запрос. Не указан id продукта.</p>";
}
?>
