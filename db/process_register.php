<?php
require_once '../classes/User.php';

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["registerUsername"]);
    $email = trim($_POST["registerEmail"]);
    $password = $_POST["registerPassword"];

    $user->registerUser($username, $email, $password);

    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../signup.php");
    exit();
}
?>