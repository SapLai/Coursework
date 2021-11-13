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
            <form action="cabinet_form/register.php" method="post">
                <p id="name">Введіть ім'я</p>
                <input type="text" placeholder="Іван" name="name" required>
                <p id="pass">Введіть прізвище</p>
                <input type="text" placeholder="Іванов" name="surname" required>
                <p id="phone">Введіть номер мобільного телефона</p>
                <input type="phone" placeholder="+380 969 352 474" name="phone" required>
                <input type="hidden" name="register" value="1">
                <button id="btn" type="submit">зареєструватися</button>
                <p id="new-sgn">якщо у вас є акаунт - <a href="index.php">
                    увійти
                </a></p>
            </form>
        </section>
    </div>

    <footer class="footer"></footer>
</div>

</body>
</html>