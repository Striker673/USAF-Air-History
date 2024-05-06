<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Galéria amerických lietadiel">
    <meta name="keywords" content="Americké lietadlá, Druhá svetová vojna, Americká letecká história, galéria">
    <meta name="author" content="Andrej Šima">
    <title>Ďakujem</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css"/>
    <script src="./js/app.js" defer></script>
</head>
<body>

<?php
include './components/header.php';
?>


<form action="db/process_logout.php" method="post">
   <?php if(isset($_SESSION['user_id'])) { ?>
       <button type="submit" class="m-5 btn btn-danger">Log Out</button>
    <?php } else { ?>
        <p>You need to be logged in to log out.</p>
    <?php } ?>
</form>



<?php
include './components/footer.php';
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
