<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS StyleSheet -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <!-- Font Awesome -->

    <script src="https://kit.fontawesome.com/3d5c46f6e6.js" crossorigin="anonymous"></script>

</head>

<body>

    <img class="bg-img" src="images/bg-image.jpg" alt="">
    <!-- NAV-BAR -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top ">

        <a class="navbar-brand" href="">SPARKS-BANK</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark navbar-dark bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel ">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body ">
                <ul class="navbar-nav  justify-content-end  flex-grow-1 pe-3 ">

                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">ABOUT US</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact" href="">CONTACT</a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>

    <div class="title-head">
        <h1 class="title-text">SPARKS-BANK</h1>
        <button type="button" class="btn btn-outline-light title-btn"><a href="viewcustomers.php"> GET STARTED</a></button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
        </script>
</body>

</html>