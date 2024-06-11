<?php
$host = "localhost"; //хост базы данных
$username = "root"; //имя пользователя базы данных
$password = ""; //пароль пользователя базы данных
$datebase = "blog"; // имя базы данных

//подключение к базе данных
$conn = new mysqli($host, $username, $password, $datebase);

//проверка подключения к бд
if ($conn->connect_error) {
    die("Ошибка подключения к БД" . $conn->connect_error);
};
