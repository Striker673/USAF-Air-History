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
    $existingUser = $user->getUserById($userID);

    if (!$existingUser) {
        die("User not found.");
    }
} catch (Exception $e) {
    die($e->getMessage());
}

$newUsername = $_POST['registerUsername'] ?? '';
$newEmail = $_POST['registerEmail'] ?? '';
$newPassword = $_POST['registerPassword'] ?? '';

if (empty($newUsername) || empty($newEmail) || empty($newPassword)) {
    die("All fields are required.");
}

try {
    $user->updateUser($userID, $newUsername, $newEmail, $newPassword);
    header("Location: ../profile.php?update=success");
    exit();
} catch (Exception $e) {
    die($e->getMessage());
}
?>
