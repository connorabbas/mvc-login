<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Resources -->
        <link href="<?php echo $baseDir; ?>/resources/vendor/bootstrap/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo $baseDir; ?>/resources/css/styles.css" rel="stylesheet">
        <script src="<?php echo $baseDir; ?>/resources/js/jquery.min.js"></script>
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" /> -->

        <!-- Page Title -->
        <title><?php echo $siteTagline.' - '.$pageTitle; ?></title>
    </head>
    <body>
        <div id="mainNav">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <a class="navbar-brand" href="#">DEV</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link active" aria-current="page" href="/mvc-login/">Home</a>
                            <a class="nav-link" href="/mvc-login/sign-up/">Sign-Up</a>
                        </div>
                    </div>
                    <div class="d-flex">
                        <div class="navbar-nav">
                            <?php
                            if($loggedIn){
                                ?>
                                <a class="nav-link" href="/mvc-login/logout/">Logout</a>
                                <?php
                            } else{
                                ?>
                                <a class="nav-link" href="/mvc-login/login/">Login</a>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <div id="containerOuter">
            <!-- Site content from views starts -->
