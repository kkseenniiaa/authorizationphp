<?php
include("./aplecation/users.php")
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">
    <title>Форма авторизации</title>
</head>

<body>
    <div class="wrapper">
        <form action="auth.php" class="form" method="POST">
            <div class="form__content">
                <h3 class="form__title">Авторизация</h3>
                <div class="form__row">
                    <input type="email" class="form__input" id="email" name="email" placeholder="Ваш email">
                </div>
                <div class="form__row">
                    <input type="password" class="form__input" id="password" name="password" placeholder="Ваш пароль">
                </div>
                <div class="form__row">
                    <button class="btn" name="button-log" type="submit"><b>Войти</b></button>
                </div>
            </div>
        </form>
    </div>

</body>

</html>