<?php
session_start();
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
    <title>Главная страница</title>
</head>

<body>
    <div class="wrapper">
        <header class="header">
            <div class="username">Ksenia | </div>
            <div class="btnss">
                <?php if (!isset($_SESSION['id'])) : ?>
                    <a href="/auth.php" class="btns" id="auth">войти</a>
                <?php else : ?>
                    <form action="/profile/logout.php">
                        <button class="btns" id="btn-exit">выйти</button>
                    </form>
                <?php endif; ?>
                <a href="/registration.php" class="btns" id="auth">зарегестрироваться</a>
            </div>
        </header>
        <div class="container">
            <div class="img-wrap">
                <img width="650px" src="/img/d10f7a185f3911ee97791e2a02a7791f_upscaled.jpg" alt="фото" class="user-img">
            </div>
            <div class="info">
                <div class="info__username"><span>K</span>senia</div>
                <div class="info__about">Сайт любой сложности</div>
                <div class="info__btns">
                    <?php if (isset($_SESSION['id'])) : ?>
                        <a href="/profile/accaunt.php" class="btn login">Личный кабинет</a>
                        <a href="/posts/createpost.php" class="btn login">Добавить пост</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>