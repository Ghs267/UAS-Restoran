<!-- BELUM LOGIN -->

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

    <!-- Font Icon -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/fonts/material-icon/css/material-design-iconic-font.min.css">
</head>

<body>

    <script>
        // var myModal = document.getElementById('myModal')
        // var myInput = document.getElementById('myInput')

        // myModal.addEventListener('shown.bs.modal', function() {
        //     myInput.focus()
        // })
    </script>

    <!-- START nav -->
    <?php if(isset($_SESSION['email'])){
        ?>
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
                    
                        <li class="nav-item nav-link2" style="display:flex;"> 
                            <a href="<?= base_url('home/profile') ?>"><img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" width="40px" height="40px" style=" border-radius: 50%; margin-top: 0.7rem;" ></a>
                            <p class="pp"><?= $user['first_name'] . ' ' . $user['last_name']; ?></p>
                        </li>

                        <li class="nav-item nav-link2" style="display:flex;"> 
                            <li class="nav-item dropdown cart">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-user"></span></a>
                                <div class="dropdown-menu" aria-labelledby="dropdown04">
                                    <a href="<?= base_url('home/profile') ?>" class="nav-link">My Profile</a>
                                    <a href="<?= base_url('Auth/logout') ?>" class="nav-link">Logout</a>
                                </div>
                            </li>
                        </li>

                </ul>
            </div>
        </div>
    </nav>
        <?php
    }else{
        ?>
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
                        <a href="<?= base_url('home/about') ?>" class="nav-link">About</a>
                    </li>
                    <!-- user with NO-PROFILE -->
                    <li class="nav-item dropdown cart">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="icon icon-user"></span></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModalNorm1">Login</a>
                            <a class="dropdown-item" data-toggle="modal" data-target="#myModalNorm2">Register</a>
                        </div>
                    </li>
                    <!--user profile nav-->
                    <!-- <li class="nav-item">
                    <a href="<?= base_url() ?>application/view/frontend/profile.html"><img src="<?= base_url() ?>assets/gambar/Jennie.jpg" width="40px" height="40px" style="border-radius: 50%;" ></a>
                </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
        <?php
    }
    ?>
    
    <!-- END nav -->
    
    
<!-- login Modal -->
<div class="modal fade" id="myModalNorm1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: black;">
                    Login
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                <?= $this->session->flashdata('message'); ?>
                <form class="user" method="post" action="<?= base_url('auth'); ?>" role="form">

                    <div class="form-group form-input">
                        <input type="emailaddress" placeholder="Email Address" name="email" id="email" value="<?= set_value('email') ?>"/>
                        <?= form_error('email', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        <!-- <label for="emailaddress" class="form-label" style="color: black;" >Email Address</label> -->
                    </div>
    
                    <div class="form-group form-input">
                        <input type="password" name="password" id="password" placeholder="Password" style="color: black;"/>
                        <?= form_error('password', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        <!-- <label for="pass" class="form-label"style="color: black;" >Password</label> -->
                    </div>
                    <button type="submit" class="btn btn-primary">
                    Submit
                    </button>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-outline-primary2" data-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>


 <!-- MODAL REGISTER -->
    <div class="modal fade" id="myModalNorm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" 
                   data-dismiss="modal">
                       <span aria-hidden="true">&times;</span>
                       <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel" style="color: black;">
                    Register
                </h4>
            </div>
            
            <!-- Modal Body -->
            <div class="modal-body">
                
            <form class="user" method="post" action="<?= base_url('auth/registration'); ?>" role="form">
                  
                    <div class="form-group form-input">
                        <input type="text" name="firstname" id="firstname" placeholder="First Name" value="<?= set_value('firstname') ?>"  style="color: black;" required/>
                        <?= form_error('firstname', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        <!-- <label for="fname" class="form-label" style="color: black;">First Name</label> -->
                    </div>
                    <div class="form-group form-input">
                        <input type="text" id="lastname" name="lastname" placeholder="Last Name"  style="color: black;"/>
                        <!-- <label for="lname" class="form-label" style="color: black;">Last Name</label> -->
                    </div>
    
                    <div class="form-group form-input">
                        <label for="tgllahir"  style="color: black;" >Birthday</label><br>
                        <input type="date" id="tgllahir" name="tgllahir" value="<?= set_value('tgllahir') ?>"  style="color: black;" >
                        <?= form_error('tgllahir', '<small class="text-danger pl-3 ">', '</small>'); ?>
                    </div>
    
                    <div class="form-group form-input">
                        <input type="text" id="alamat" name="alamat" placeholder="Address" value="<?= set_value('alamat') ?>"  style="color: black;" required />
                        <!-- <label for="address" class="form-label"  style="color: black;" >Address</label> -->
                    </div>
    
                    <div class="form-group form-input">
                        <input type="text" id="email" name="email" placeholder="Email Address" value="<?= set_value('email') ?>"  style="color: black;" required />
                        <?= form_error('email', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        <!-- <label for="emailaddress" class="form-label"  style="color: black;" >Email Address</label> -->
                    </div>
    
                    <div class="form-group form-input">
                        <input type="password" id="password1" name="password1" placeholder="Password"  style="color: black;" required/>
                        <?= form_error('password1', '<small class="text-danger pl-3 ">', '</small>'); ?>
                        <!-- <label for="password" class="form-label"  style="color: black;" >Password</label> -->
                    </div>
                    <div class="form-group form-input">
                        <input type="password" id="password2" name="password2" placeholder="Repeat Password"   style="color: black;" required/>
                        <!-- <label for="checkpass" class="form-label"  style="color: black;">Repeat Password</label> -->
                    </div>
                    <button type="submit" class="btn btn-primary">
                    Register
                    </button>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-outline-primary2" data-dismiss="modal">
                Close
                </button>
            </div>
        </div>
    </div>
</div>

</body>

<?php if($this->session->flashdata('message') != ''){ ?>
        <script>
            $('#myModalNorm1').modal('show');
        </script>
<?php } ?>