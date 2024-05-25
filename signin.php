

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

<?php include './components/header.php'; ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="mb-4">Login</h2>
            <form action="db/process_login.php" method="POST">
                <div class="mb-3">
                    <label for="loginUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="loginUsername" name="loginUsername" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="loginPassword" name="loginPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Register</h2>
            <form action="db/process_register.php" method="POST">
                <div class="mb-3">
                    <label for="registerUsername" class="form-label">Username</label>
                    <input type="text" class="form-control" id="registerUsername" name="registerUsername" required>
                </div>
                <div class="mb-3">
                    <label for="registerEmail" class="form-label">E-mail</label>
                    <input type="email" class="form-control" id="registerEmail" name="registerEmail" required>
                </div>
                <div class="mb-3">
                    <label for="registerPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" id="registerPassword" name="registerPassword" required>
                </div>
                <button type="submit" class="btn btn-success">Register</button>
            </form>
        </div>
    </div>
</div>

<?php include './components/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>
