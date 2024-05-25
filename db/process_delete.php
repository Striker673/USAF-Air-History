<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../signin.php");
    exit();
}

require_once '../classes/User.php';

$userID = $_SESSION['user_id'];
$user = new User();

try {
    session_destroy();

    $rowCount = $user->deleteUserById($userID);

    if ($rowCount > 0) {
        header("Location: ../signin.php?delete=success");
        exit();
    } else {
        header("Location: ../index.php?delete=failed");
        exit();
    }
} catch (Exception $e) {
    die($e->getMessage());
}
?>
