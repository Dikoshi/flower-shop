<?php
session_start();
require_once 'config/db.php';

// Добавление в корзину
if (isset($_GET['add'])) {
    $id = (int)$_GET['add'];
    $stmt = $db->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch();

    if ($product) {
        $_SESSION['cart'][$id] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => ($_SESSION['cart'][$id]['quantity'] ?? 0) + 1
        ];
    }
    header("Location: /cart.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>Ваша корзина</h1>
    
    <?php if (empty($_SESSION['cart'])): ?>
        <p>Корзина пуста</p>
    <?php else: ?>
        <table>
            <tr>
                <th>Товар</th>
                <th>Цена</th>
                <th>Количество</th>
                <th>Сумма</th>
            </tr>
            <?php 
            $total = 0;
            foreach ($_SESSION['cart'] as $item): 
                $sum = $item['price'] * $item['quantity'];
                $total += $sum;
            ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['price'] ?> руб.</td>
                    <td><?= $item['quantity'] ?></td>
                    <td><?= $sum ?> руб.</td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan="3"><strong>Итого:</strong></td>
                <td><strong><?= $total ?> руб.</strong></td>
            </tr>
        </table>
        
        <a href="/order.php">Оформить заказ</a>
    <?php endif; ?>
</body>
</html>