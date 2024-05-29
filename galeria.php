<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Galéria amerických lietadiel">
    <meta name="keywords" content="Americké lietadlá, Druhá svetová vojna, Americká letecká história, galéria">
    <meta name="author" content="Andrej Šima">

    <title>Galéria - USAF Lietadlá</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="./css/style.css" />


    <script src="./js/app.js" defer></script>

</head>

<body>
    <?php
    include './components/header.php';
    ?>


    <div class="container">
        <div class="row">
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
                    $src = 'data:image/jpeg;base64,' . $imageData;

                    echo '<img src="' . $src . '" style="max-width: 300px; margin: 10px;" />';
                }
            } catch (PDOException $e) {
                die("Error: " . $e->getMessage());
            }
            ?>
        </div>

        <!-- Tlačidlo pre upload obrázkov -->
        <?php if (isset($_SESSION['user_id'])) { ?>
            <div class="row mt-4">
                <div class="col-md-6">
                    <h2 class="mb-4">Upload Image</h2>
                    <form method="post" action="upload.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="image" class="form-label">Select Image (JPG only)</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/jpeg" required>
                </div>
                <button type="submit" class="btn btn-primary">Upload Image</button>
            </form>
                </div>
            </div>
        <?php } 
        ?>
    </div>

    <?php include './components/accordion.php' ?>

    <?php include './components/footer.php' ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>

</html>
