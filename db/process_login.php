<?php
require_once '../classes/database.php';
require_once '../classes/User.php';  

$user = new User();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["loginUsername"]);
    $password = $_POST["loginPassword"];
    $keepLoggedIn = isset($_POST["keepLoggedIn"]);

    if (empty($username)) {
        die("Username is required");
    }

    $userData = $user->getUserByUsername($username);

    if ($userData && password_verify($password, $userData['password'])) {
        session_start();
        $_SESSION['user_id'] = $userData['id'];
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../signin.php");
        exit();
    }
} else {
    header("Location: ../signin.php");
    exit();
}
?>