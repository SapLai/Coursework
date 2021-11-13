<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: /index.php');
}
$id = $_GET['id'];
$host = 'localhost';
$user = 'parkhu3l_tasks';
$pass = '%4H*ghkY';
$db_name = 'parkhu3l_tasks';
$conn = new mysqli($host, $user, $pass, $db_name);
$sql = "SELECT * FROM events WHERE id = '$id'";
$list = $conn->query($sql)->fetch_assoc();

if(isset($_POST['save'])){
    $name = $_POST['name'];
    $description  = $_POST['description'];
    $created_at = $_POST['created_at'];
    $dedline_at = $_POST['dedline_at'];
    $done_at = $_POST['done_at'];
    $sql_update = "UPDATE events SET name = '$name', description = '$description', created_at ='$created_at', done_at = '$done_at', dedline_at = '$dedline_at' WHERE id='$id'";
    $conn->query($sql_update);
    header('Location: /tasks.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сторінка нотатків користувача</title>
    <link rel="stylesheet" href="./scss/style.css">
</head>

<body>
    <header class="header">
        <div class="wrap-header">
            <div class="logo-header">
                <span>
                    НОТАТНИК
                </span>
            </div>
            <div class="header-name">
                <h2><?php echo $_SESSION['user']['name'].' '.$_SESSION['user']['surname']?></h2>
            </div>
        </div>
    </header>

    <div id="content">
        <section class="card-wrap">
                <div class="card">
                    <form action="" method="post">
                        Назва:<br><input type="text" class="redact_name" name="name" value="<?php echo $list['name']?>">
                        <br>Опис:<textarea name="description" id="description" class="redact_description"><?php echo $list['description']?></textarea>
                        <br>Дедлайн: <input type="date" class="redact_date" name="dedline_at" id="deadline" value="<?php echo date('Y-m-d', strtotime($list['dedline_at']))?>">
                        <br>Дата додання: <input type="date" class="redact_date" name="created_at" id="deadline" value="<?php echo date('Y-m-d', strtotime($list['created_at']))?>">
                        <br>Виконано:<input type="date" class="redact_date" name="done_at" id="date-done" value="<?php echo date('Y-m-d', strtotime($list['done_at']))?>">
                        <hr>
                        <div class="btn-options">
                             <input type="hidden" name="save" value="1">
                             <button type="submit" class="save">Зберегти</button>
                        </div>
                    </form>
                </div>
        </section>
    </div>

    <footer class="footer"></footer>
</body>

</html>