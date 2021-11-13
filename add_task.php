<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /index.php');
}
$host = 'localhost';
$user = 'parkhu3l_tasks';
$pass = '%4H*ghkY';
$db_name = 'parkhu3l_tasks';
$conn = new mysqli($host, $user, $pass, $db_name);
$sql = "SELECT * FROM events";
if(isset($_POST['add_event'])) {
    $task_id = $_POST['done_id'];
    $created_at = date("Y-m-d H:i:s");
    $name = $_POST['name'];
    $dedline_at = $_POST['dedline_at'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user']['id'];

    $sql = "INSERT INTO events (name, description, created_at, dedline_at, user_id)
VALUES ('$name', '$description', '$created_at', '$dedline_at', '$user_id')";
    $conn->query($sql);
    header('Location: /tasks.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Добавлення події в нотатник</title>
    <link rel="stylesheet" href="./scss/style.css">
</head>
<body>
    <div id="site">
    
        <header class="header">
            <div class="wrap-header">
                <div class="logo-header">
                    <span>
                        НОТАТНИК
                    </span>
                </div>
            </div>
        </header>
    
        <div id="content">
            <section class="add">
                <form action="#" method="post">
                    <p id="title-day">Введіть назву події</p>
                    <input type="text" name="name" required>
                    <p id="time">Вкажіть дату дедлайна</p>
                    <input type="date" name="dedline_at" required>
                    <p id="description-day">Введіть опис події</p>
                    <textarea name="description" id="" cols="30" rows="10" required></textarea>
                    <input type="hidden" name="add_event" value="1">
                    <button type="submit">додати</button>
                </form>
            </section>
        </div>
    
        <footer class="footer"></footer>
</body>
</html>