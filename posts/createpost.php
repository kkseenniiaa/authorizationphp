<?php
session_start();
include("aplecation/db.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $content = mysqli_real_escape_string($conn, $_POST['content']);
    $user_id = $_SESSION['id'];

    $sql = "INSERT INTO post (title, content) VALUES ('$title', '$content')";

    if ($conn->query($sql) === TRUE) {
        echo "новый пост успешно добавлен";
        header("location: ../index.php");
    } else {
        echo 'Ошибка' . $sql . '<br>' . $conn->error;
    };
    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать пост</title>
</head>

<body>
    <form action="createpost.php" method="$_POST" enctype="multipart/form-data">
        <div>
            <label>
                Заголовок: <br>
                <input type="text" id="title" name="title"> <br>
            </label>
        </div>
        <div>
            <label>
                Содержание: <br>
                <textarea name="content" id="content" rows="6"></textarea>
            </label>
        </div>
        <div>
            <button type="submit">Создать пост</button>
        </div>
    </form>
</body>

</html>