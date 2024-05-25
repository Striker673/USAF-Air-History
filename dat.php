<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Display Images from Database</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>Upload Image</h3>
            <form method="post" action="upload.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Select Image (JPG only)</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/jpeg" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </form>
        </div>
    </div>
</div>

<h2>Images from Database</h2>

<?php
$host = 'localhost';
$dbname = 'usafone';
$username = 'root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT image_src FROM airplanes");

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $imageData = base64_encode($row['image_src']);
        $src = 'data:image/jpeg;base64,' . $imageData; // Assuming images are JPEG format

        echo '<img src="'.$src.'" style="max-width: 300px; margin: 10px;" />';
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
        </div>
    </div>
</body>
</html>
