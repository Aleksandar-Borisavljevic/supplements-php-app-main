<?php
    // $_SESSION['role'] = '';
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no"/>
    <link rel="icon" href="assets/img/absolute-logo.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css"/>
    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/ea423c9116.js" crossorigin="anonymous"></script>

    <!-- JS -->
    <script src="assets/js/validation.js"></script>
    <script src="assets/js/checkForm.js"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="assets/css/global.css">
    <link rel="stylesheet" href="assets/css/home.css">

    <title>Absolute Supplements</title>
</head>

<body>
<nav style="background:red" class="navbar navbar-expand-lg">
    <div class="container">
        <!-- <a class="navbar-brand" href="#">Navbar</a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Početna</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">O nama</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="supplements.php?message=""">Suplementi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Kontakt</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="gallery.php">Galerija</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="valuation.php">Vrednovanje</a>
                </li>
      
                <?php  
                    if(isset($_SESSION['email'])){
                        echo '<li class="nav-item"> <a class="nav-link" href="profile.php">Vaš nalog</a> </li>';
                        echo '<li class="nav-item"> <a class="nav-link" href="logout.php">Odjavite se</a> </li>';
                    }
                    else{
                        echo '<li class="nav-item"> <a class="nav-link" href="registration.php">Registruj se</a> </li>';
                        echo '<li class="nav-item"> <a class="nav-link" href="login.php">Prijavite se</a> </li>';
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>