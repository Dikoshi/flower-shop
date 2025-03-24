<?php require_once 'config/db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Цветочный магазин</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Шапка сайта -->
<header class="site-header">
  <div class="header-container">
    <a href="/" class="logo">
      <span class="logo-icon">🌸</span>
      <span class="logo-text">Цветочная Лавка</span>
    </a>
    <p class="tagline">Дарим красоту и радость каждый день</p>
    
    <div class="header-contacts">
      <a href="tel:+79161234567" class="contact-item">
        <span class="contact-icon phone-icon">📞</span>
        +7 (916) 123-45-67
      </a>
      <a href="mailto:info@flowershop.ru" class="contact-item">
        <span class="contact-icon">✉️</span>
        info@flowershop.ru
      </a>
    </div>
    
    <nav class="main-nav">
      <ul class="nav-list">
        <li class="nav-item">
          <a href="/" class="nav-link active">
            <span class="nav-icon">🏠</span>
            Главная
          </a>
        </li>
        <li class="nav-item">
          <a href="/catalog.php" class="nav-link">
            <span class="nav-icon">🌹</span>
            Каталог
          </a>
        </li>
        <li class="nav-item">
          <a href="/about.php" class="nav-link">
            <span class="nav-icon">ℹ️</span>
            О нас
          </a>
        </li>
        <li class="nav-item">
          <a href="/contacts.php" class="nav-link">
            <span class="nav-icon">📌</span>
            Контакты
          </a>
        </li>
      </ul>
    </nav>
  </div>
</header>

    <main>
        <h2>Популярные товары</h2>
        <div class="products">
            <?php
            $stmt = $db->query("SELECT * FROM products LIMIT 6");
            while ($row = $stmt->fetch()) {
                #echo '<img width=150px src='.$row['image'].'>';
                echo '<div class="product">';
                echo '<img src="'.$row['image'].'" alt="'.$row['name'].'" class="product-image">';
                
                echo '<div class="product-details">';
                echo '<h3><?=' .$row['name']. '?></h3>';
                echo '<p class="price">'.$row['price'].' руб.</p>';
                echo '<div class="description-container">';
                echo '<p class="description">' .$row['description']. '</p>';
                echo '</div>';
                echo '<a href="product.php?id=<?=' .$row['id']. '?>" class="view-btn">Подробнее</a>';
                echo '<a href="cart.php?add=<?= '.$row['id']. '?>" class="add-to-cart-btn">В корзину</a>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </main>

    <!-- Подвал сайта -->
<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-section">
      <h3 class="footer-title">Наши контакты</h3>
      <ul class="contact-list">
        <li>
          <i>📍</i>
          <span>г. Москва, ул. Цветочная, д. 15</span>
        </li>
        <li>
          <i>📞</i>
          <a href="tel:+79161234567">+7 (916) 123-45-67</a>
        </li>
        <li>
          <i>✉️</i>
          <a href="mailto:info@flowershop.ru">info@flowershop.ru</a>
        </li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3 class="footer-title">Часы работы</h3>
      <ul class="contact-list">
        <li>
          <i>🕒</i>
          <span>Пн-Пт: 9:00 - 20:00</span>
        </li>
        <li>
          <i>🕒</i>
          <span>Сб-Вс: 10:00 - 18:00</span>
        </li>
      </ul>
    </div>
    
    <div class="footer-section">
      <h3 class="footer-title">Мы в соцсетях</h3>
      <div class="social-links">
        <a href="#" class="social-link">📱</a>
        <a href="#" class="social-link">💬</a>
        <a href="#" class="social-link">📷</a>
        <a href="#" class="social-link">🎥</a>
      </div>
    </div>
  </div>
</footer>
</body>
</html>