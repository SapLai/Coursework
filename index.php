<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <title>Реєстрація/Авторизація користувача</title>
    <link href="css/style.css" type="text/css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js" type="text/javascript"></script>
    <script src="js/event.js"></script>
    <script src="js/main.js"></script>
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
        <section class="sgn">
            <?php if(!isset($_SESSION['user'])) : ?>
                <form action="cabinet_form/authorization.php" method="post" id="authorization_user">
                    <p id="name">Введіть логін</p>
                    <input type="text" placeholder="test" name="name">
                    <p id="pass">Введіть телефон</p>
                    <input type="phone" name="phone">
                    <p id="demo" class="error_notify">Невірний логін або пароль!</p>
                    <p id="demo" class="error_notify_empty">Заповніть всі поля!</p>
                    <button id="btn" type="submit">Увійти</button>
                    <input type="hidden" name="authorization" value="1">
                    <p id="new-sgn">якщо у вас не має акаунта - <a href="register.php">
                            зареєструйтеся
                    </a></p>
                </form>
            <?php else:?>
                <form action="cabinet_form/authorization.php" method="post">
                    <input type="hidden" name="logout" value="1">
                    <button id="btn" type="submit">Вийти з аккаунту</button>
                </form>
            <?php endif;?>
        </section>
    </div>

    <footer class="footer"></footer>
    <!-- script -->
    <script src="./js/script.js"></script>
</div>

</body>
</html>