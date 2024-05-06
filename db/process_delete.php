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
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$userID = $_SESSION['user_id'];


$sql = "DELETE FROM users WHERE id = ?";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([$userID]);
    $rowCount = $stmt->rowCount();

    if ($rowCount > 0) {
        session_destroy();
        header("Location: ../signin.php?delete=success");
        exit();
    } else {
        header("Location: ../index.php?delete=failed");
        exit();
    }
} catch (PDOException $e) {
    die("Failed to delete user account: " . $e->getMessage());
}
?>
