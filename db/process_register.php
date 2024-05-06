<?php
$host = 'localhost';
$dbname = 'usaf';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Nastavenie režimu chybovania na výnimky
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["registerUsername"]);
    $email = trim($_POST["registerEmail"]);
    $password = $_POST["registerPassword"];

    if (empty($username)) {
        die("Username is required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    if (strlen($password) < 6) {
        die("Password must be at least 6 characters long");
    }

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $email, $hashedPassword]);


    header("Location: ../index.php");
    exit();
} else {
    header("Location: ../signup.php");
    exit();
}

?>
