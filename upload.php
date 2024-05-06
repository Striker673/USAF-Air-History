<?php
$host = 'localhost';
$dbname = 'usaf';
$username = 'root';
$password = '';


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        $stmt = $pdo->prepare("INSERT INTO airplanes (image_src) VALUES (?)");
        $stmt->bindParam(1, $imageData, PDO::PARAM_LOB);
        $stmt->execute();

        header("Location: dat.php");
        exit();
    } else {
        echo "Error uploading file.";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
?>
