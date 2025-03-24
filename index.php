<?php require_once 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Цветочный магазин</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Магазин цветов</h1>
        <nav>
            <a href="">Главная</a>
            <a href="catalog.php">Каталог</a>
            <a href="cart.php">Корзина</a>
        </nav>
    </header>

    <main>
        <h2>Популярные товары</h2>
        <div class="products">
            <?php
            $stmt = $db->query("SELECT * FROM products LIMIT 3");
            while ($row = $stmt->fetch()) {
                echo '<div class="product">';
                echo '<h3>'.$row['name'].'</h3>';
                echo '<p>Цена: '.$row['price'].' руб.</p>';
                echo '<a href="/product.php?id='.$row['id'].'">Подробнее</a>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

    <footer>
        Контакты: +7 (123) 456-78-90
    </footer>
</body>
</html>