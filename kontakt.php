<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Galéria amerických lietadiel">
        <meta name="keywords" content="Americké lietadlá, Druhá svetová vojna, Americká letecká história, galéria">
        <meta name="author" content="Andrej Šima">
        <title>Kontakt</title>

      
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

     
        <link
        rel="stylesheet" href="./css/style.css"/>

       
        <script src="./js/app.js" defer></script>
    </head>

    <body>
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="./img/Roundel_of_the_USAF.svg.png" alt="Your Logo" width="150" height="79" class="d-inline-block rounded-circle">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Domov</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="info.php">História</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="galeria.php">Galéria</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="kontakt.html">Kontakt</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    
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

        <!-- Footer -->
        <footer class="bg-dark text-light py-3 ">

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>&copy; 2023 Andrej Šima. Všetky práva vyhradené.</p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <p>Dizajnér stránky -
                            <i class="fas fa-heart text-danger"></i>
                            Andrej Šima</p>
                            <p>email:<i class="fa fa-envelope" aria-hidden="true">
                                    <a href="mailto:andrej.sima@student.ukf.sk">
                                      andrej.sima@student.ukf.sk</a>
                                </i>
                            </p>
                            <p>mobilné číslo:<i class="fa fa-phone" aria-hidden="true">
                                    <a href="tel:0939206021">
                                        0939206021</a>
                                </i>
                            </p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    </body>

</html>
