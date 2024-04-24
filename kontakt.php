<!DOCTYPE html>
<html lang="en" >

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Galéria amerických lietadiel">
        <meta name="keywords" content="Americké lietadlá, Druhá svetová vojna, Americká letecká história, galéria">
        <meta name="author" content="Andrej Šima">
        <title>Kontakty</title>

      
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     
        <link
        rel="stylesheet" href="./css/style.css"/>

       
        <script src="./js/app.js" defer></script>
    </head>

    <body>
        <!-- Navigation -->
        <?php
        include './components/header.php';
        ?>
    
        <div class="container mt-5">

            <h1 class="text-center">Kontakt</h1>

          
            <form id="contact" action="thankyou.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Vaše meno</label>
                    <input type="text" class="form-control" id="meno" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Váš email</label>
                    <input type="email" class="form-control" id="email" required>
                </div>

                <div class="mb-3">
                    <label for="message" class="form-label">Správa</label>
                    <textarea class="form-control" id="sprava" rows="4" required></textarea>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="suhlas" required>
                    <label class="form-check-label" for="consent">Súhlasím so spracovaním údajov.</label>
                </div>

                <button type="submit" class="btn btn-primary">Odoslať</button>
            </form>
        </div>

        <?php include './components/footer.php'?>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
