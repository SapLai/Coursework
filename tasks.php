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
$user_id = $_SESSION['user']['id'];
$sql = "SELECT * FROM events WHERE user_id = '$user_id'";
$list = [];
foreach ($conn->query($sql) as $row) {
    $list[] = $row;
}

if(isset($_POST['done_id'])) {
    $task_id = $_POST['done_id'];
    $done_at = date("Y-m-d H:i:s");
    $sql_update = "UPDATE events SET done_at = '$done_at' WHERE id='$task_id'";
    $conn->query($sql_update);
    header('Location: /tasks.php');
}

if(isset($_POST['delete_id'])) {
    $task_id = $_POST['delete_id'];
    $sql_update = "DELETE FROM events WHERE id='$task_id'";
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
            <div class="header-btn">
                <form action="generate_pdf.php" method="post">
                    <input type="hidden" name="save_pdf" value="1">
                    <button type="submit" id="pdf-file" class="upload_pdf">
                       Завантажити файл
                    </button>
                </form>
                <span>
                    <a href="add_task.php">
                        Добавити подію
                    </a>
                </span>
            </div>
        </div>
    </header>

    <div id="content">
         <section class="card-wrap">
            <?php foreach ($list as $item) : ?>
                <div class="card">
                    <?php $status = '' ?>
                    <?php if(date('Y-m-d') > $item['dedline_at']):?>
                        <?php $status = 'name-no-done' ?>
                    <?php elseif ($item['done_at']):?>
                        <?php $status = 'name-done' ?>
                    <?php endif;?>
                    <p id="<?=$status?>"><b><?php echo $item['name']?></b></p>
                    <p id="description"><?php echo $item['description']?></p>
                    <p id="deadline">Дедлайн: <i><?php echo date("d-m-Y", strtotime($item['dedline_at']))?></i></p>
                    <p id="date">Дата додання: <i><?php echo date("d-m-Y", strtotime($item['created_at']))?></i></p>
                    <p id="date-done">Виконано: <i><?php echo $item['done_at'] ? date("d-m-Y", strtotime($item['done_at'])) : '' ?></i></p>
                    <hr>
                    <div class="btn-options">
                        <form action="" method="post">
                            <input type="hidden" name="delete_id" value="<?php echo $item['id']?>">
                            <button type="submit" id="delete">Видалити</button>
                        </form>
                        <?php if(date('Y-m-d') < $item['dedline_at']):?>
                            <form action="" method="post">
                                <input type="hidden" name="done_id" value="<?php echo $item['id']?>">
                                <button type="submit" id="done">Виконано</button>
                            </form>
                        <?endif;?>
                        <a href="redact.php?id=<?php echo $item['id']?>"><span id="reg">Редагувати</span></a>
                    </div>
                </div>
            <?php endforeach ?>
            <div class="logout_box">
                <form action="cabinet_form/authorization.php" method="post">
                    <input type="hidden" name="logout" value="1">
                    <button id="btn" type="submit" class="logout_button">Вийти з аккаунту</button>
                </form>
            </div>
        </section>
    </div>

    <footer class="footer"></footer>
</body>

</html>