<?php
$host = 'localhost';
$user = 'parkhu3l_tasks';
$pass = '%4H*ghkY';
$db_name = 'parkhu3l_tasks';
$conn = new mysqli($host, $user, $pass, $db_name);
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $phone = $_POST['phone'];

    $sql = "INSERT INTO users (name, surname, phone)
VALUES ('$name', '$surname', '$phone')";
    $conn->query($sql);
}
header('Location: /index.php');
?>