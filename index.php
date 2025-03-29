<?php require_once 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Цветочный магазин</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Общие стили -->
    <link rel="stylesheet" href="css/index.css"> <!-- Стили для главной страницы -->
    <!-- Подключение FontAwesome для иконок -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
<?php
include 'header.php'; // Подключаем шапку
?>

<main>
    <h2>Популярные товары</h2>
    <div class="products">
        <?php
        $stmt = $db->query("SELECT * FROM products LIMIT 6");
        while ($row = $stmt->fetch()) {
            echo '<div class="product">';
            echo '<img src="'.$row['image'].'" alt="'.$row['name'].'" class="product-image">';
            
            echo '<div class="product-details">';
            echo '<h3>' .$row['name']. '</h3>';
            echo '<p class="price">'.$row['price'].' руб.</p>';
            echo '<div class="description-container">';
            echo '<p class="description">' .$row['description']. '</p>';
            echo '</div>';
            // Исправленный тег <a>
            echo '<a href="product.php?id='.$row['id'].'" class="view-btn">Подробнее</a>';
            echo '<a href="flower-shop/cart.php?add='.$row['id'].'" class="add-to-cart-btn">В корзину</a>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</main>
<?php
include 'footer.php'; // Подключаем шапку
?>
</body>
</html>