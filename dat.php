<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Images from Database</title>
</head>
<body>

<h2>Images from Database</h2>

<?php
$host = 'localhost';
$dbname = 'usaf';
$username = 'root';
$password = '';
try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Select all images from database
    $stmt = $pdo->query("SELECT image_src FROM airplanes");

    // Display images
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $imageData = base64_encode($row['image_src']);
        $src = 'data:image/jpeg;base64,' . $imageData; // Assuming images are JPEG format

        echo '<img src="'.$src.'" style="max-width: 300px; margin: 10px;" />';
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>

</body>
</html>
