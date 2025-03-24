<?php
session_start();
require_once 'config/db.php';

if (empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Обработка формы заказа
    $name = trim($_POST['name']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    
    // Рассчитываем итоговую сумму
    $total = 0;
    $products = [];
    foreach ($_SESSION['cart'] as $item) {
        $total += $item['price'] * $item['quantity'];
        $products[] = $item['name'] . ' ('.$item['quantity'].' шт.)';
    }
    $products_list = implode(', ', $products);
    
    // Сохраняем заказ в БД
    $stmt = $db->prepare("INSERT INTO orders (customer_name, phone, email, address, products, total) 
                         VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $phone, $email, $address, $products_list, $total]);
    
    // Очищаем корзину
    unset($_SESSION['cart']);
    
    // Перенаправляем на страницу благодарности
    header("Location: /thankyou.php?order_id=".$db->lastInsertId());
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Оформление заказа</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Оформление заказа</h1>
    
    <form method="POST">
        <div>
            <label>Ваше имя:</label>
            <input type="text" name="name" required>
        </div>
        
        <div>
            <label>Телефон:</label>
            <input type="tel" name="phone" required>
        </div>
        
        <div>
            <label>Email:</label>
            <input type="email" name="email">
        </div>
        
        <div>
            <label>Адрес доставки:</label>
            <textarea name="address" required></textarea>
        </div>
        
        <button type="submit">Подтвердить заказ</button>
    </form>
</body>
</html>