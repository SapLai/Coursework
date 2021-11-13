<?php
session_start();
$host = 'localhost';
$user = 'parkhu3l_tasks';
$pass = '%4H*ghkY';
$db_name = 'parkhu3l_tasks';
$conn = new mysqli($host, $user, $pass, $db_name);
if (isset($_POST['check_form'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $sql = "SELECT * FROM users WHERE name='$name' AND phone='$phone'";
    $query = $conn->query($sql);
    if($query->num_rows){
        $_SESSION['user'] = $query->fetch_assoc();
        echo true;
    }
    else{
        echo false;
    }
}
if(isset($_POST['logout'])){
    session_destroy();
    header('Location: /index.php');
}

?>