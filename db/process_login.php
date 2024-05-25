<?php
$host = 'localhost';
$dbname = 'usafone';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["loginUsername"]);
    $password = $_POST["loginPassword"];
    $keepLoggedIn = isset($_POST["keepLoggedIn"]); 
    
    if (empty($username)) {
        die("Username is required");
    }

    $sql = "SELECT * FROM users WHERE username = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        session_start(); 

        $_SESSION['user_id'] = $user['id'];

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