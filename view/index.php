<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <!-- js links  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- css     -->
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body>




    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="../assets/images/logo.png" alt="index.php"></a>

            <div class="collapse  navbar-collapse" id="navbarNavAltMarkup">
                <span onclick="toggle()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-x-lg"
                        viewBox="0 0 16 16">
                        <path
                            d="M1.293 1.293a1 1 0 0 1 1.414 0L8 6.586l5.293-5.293a1 1 0 1 1 1.414 1.414L9.414 8l5.293 5.293a1 1 0 0 1-1.414 1.414L8 9.414l-5.293 5.293a1 1 0 0 1-1.414-1.414L6.586 8 1.293 2.707a1 1 0 0 1 0-1.414z" />
                    </svg>
                </span>
                <div class="navbar-nav">

                    <div class="left">
                        <a class="nav-link active" aria-current="page" href="#">Apropos</a>
                        <a class="nav-link" href="#">Plats</a>
                        <a class="nav-link" href="#">Nos specialites</a>
                        <a class="nav-link" href="#">Nos boisons</a>
                        <a class="nav-link" href="contact.php">Contactez-nous</a>
                    </div>

                    <div class="right">
                        <a class="nav-link btn btn-success" href="#">Conecxion</a>
                        <a class="nav-link btn btn-dark" href="#">Inscription</a>
                    </div>

                </div>
            </div>
            <span class="menu" onclick="toggle()">
                <svg xmlns=" http://www.w3.org/2000/svg" width="45" height="45" fill="white" class="bi bi-list"
                    viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
                </svg>
            </span>
    </nav>


    <div class="main">
        <div class="overlay">
            <div class="left-name">
                <h1>RESTAURANT LA <br> FOURCHETTE</h1>
                <p>Avec le ventre plain tout est possible</p>
            </div>
            <div class="bottom">
                <span>Goutez au meilleurs <div class="blo" style="margin-left: 30px;">plats africains</div></span>
                <a href="#"><img src="../assets/images/gif-arrow.gif" alt=""></a>
            </div>
        </div>
    </div>



    <script src="../assets/js/app.js"></script>
</body>

</html>