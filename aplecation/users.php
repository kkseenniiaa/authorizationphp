<?php
session_start();
include("aplecation/db.php");

//функция для установки значений сессии
function setSession($id, $us_name)
{
    $_SESSION['id'] = $id;
    $_SESSION['us_name'] = $us_name;
};

//авторизация пользователя
//если страница запрашивает методом POST И ВНУТРИ МАССИВА $_POST есть элемент с ключом button-log
//то
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button-log'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    echo "логин" . $email;
    echo '<br>';
    echo "пароль" . $password;
}
//регистрация пользователя
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button-reg'])) {
    $us_name = $_POST['login'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $pass_first = $_POST['pass-first'];
    $pass_second = $_POST['pass-second'];
    if ($pass_first !== $pass_second) {
        echo "Пароли не совпадают";
    } else {
        $hashed_password = password_hash($pass_first, PASSWORD_DEFAULT);
        $check_email_query = "SELECT *  FROM users WHERE email='$email'";
        $check_email_result = $conn->query($check_email_query);
        if ($check_email_result->num_rows > 0) {
            echo "Пользователь с таким адресом электронной почты уже существует!";
        } else {
            $stmt = $conn->prepare("INSERT INTO users (us_name, email, age, password) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssis", $us_name, $email, $age, $hashed_password);
            if ($stmt->execute()) {
                echo "Регитсрация успешна!";
                setSession($conn->insert_id, $us_name);
                header("Location: /profile/accaunt.php");
                exit();
            } else {
                echo "Ошибка при регистрации: " . $conn->error;
            }
            $stmt->close();
        }
    }
}
//авторизация пользователя
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['button-log'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $stmt = $conn->prepare("SELECT id, us_name, age, password FROM users WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            echo "Авторизация успешна! Добро пожаловать!" . $row['us_name'];
            setSession(
                $row['id'],
                $row['us_name'],
            );
            header("Location: /profile/accaunt.php");
            exit();
        } else {
            echo "Неверный пароль!";
        }
    } else {
        echo "Пользователь с таким адресом электронной почты не найден!";
    }
    $stmt->close();
}
