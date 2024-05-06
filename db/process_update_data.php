<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../signin.php");
    exit();
}

$host = 'localhost';
$dbname = 'usaf';
$username = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userID = $_SESSION['user_id'];

    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userID]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        // User not found, redirect to sign-in page or display an error
        die("User not found.");
    }




} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}

$newUsername = $_POST['registerUsername'] ?? '';
$newEmail = $_POST['registerEmail'] ?? '';
$newPassword = $_POST['registerPassword'] ?? '';

if (empty($newUsername) || empty($newEmail) || empty($newPassword)) {
    die("All fields are required.");
}

$hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

$userID = $_SESSION['user_id'];

$sql = "UPDATE users SET username = :username, email = :email, password = :password WHERE id = :id";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':username', $newUsername);
$stmt->bindParam(':email', $newEmail);
$stmt->bindParam(':password', $hashedPassword);
$stmt->bindParam(':id', $userID);

try {
    $stmt->execute();

    header("Location: ../profile.php?update=success");
    exit();
} catch (PDOException $e) {
    die("Failed to update user information: " . $e->getMessage());
}
?>
