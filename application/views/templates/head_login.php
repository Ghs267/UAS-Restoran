<!DOCTYPE html>
<html lang="en">

<head>
    <title>BOBA Witch</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/aos.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/ionicons.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/jquery.timepicker.css">


    <link rel="stylesheet" href="<?= base_url() ?>assets/css/flaticon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/icomoon.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/style.css">

    <!-- REGISTER LOGIN -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <!-- MODAL -->
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">
</head>

<body>

    <script>
        var myModal = document.getElementById('myModal')
        var myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', function() {
            myInput.focus()
        })
    </script>

    <!-- START nav -->
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url() ?>">BOBA<small>witch</small></a>
            <!--nanti bisa di ganti logo ??-->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">

                    <li class="nav-item active"><a href="<?= base_url() ?>" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="<?= base_url('home/menu') ?>" class="nav-link">Menu</a></li>
                    <li class="nav-item">
                        <a href="<?= base_url('home/history') ?>" class="nav-link">History</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('home/about') ?>" class="nav-link">About</a>
                    </li>

                    <li class="nav-item acti cart">
                        <a href="<?= base_url('home/cart') ?>" class="nav-link">
                            <span class="icon icon-shopping_cart"></span>
                            <span class="bag d-flex justify-content-center align-items-center">
                                <small>0</small>
                                <!--ini nanti mungkin bisa diatur biar sesuai bnyk ny yg dipesen-->
                            </span>
                        </a>
                    </li>
                    <!-- user with NO-PROFILE
                    <li class="nav-item dropdown cart">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-user"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" href="<?= base_url('auth') ?>">Login</a>
                            <a class="dropdown-item" href="<?= base_url('auth/registration') ?>">Register</a>
                        </div>
                    </li> -->

                    <!--user profile nav-->
                    
                        <li class="nav-item nav-link2"> 
                            <a href="<?= base_url() ?>application/view/frontend/profile.html"><img src="<?= base_url() ?>assets/gambar/Jennie.jpg" width="40px" height="40px" style=" border-radius: 50%;" ></a>
                        </li>
                
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    
