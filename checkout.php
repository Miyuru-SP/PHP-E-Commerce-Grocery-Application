<?php
include_once("./includes/connect.php");
include_once("./functions/functions.php");
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Web</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
     <link rel="stylesheet" href="style.css">
     <style>
        body{
            overflow-x: hidden;
        }
        .title{
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <?php
        cart();
    ?>

    <!-- navbar -->
     <div class="container-fluid p-0 fixed-top custom-navbar bg-body-secondary" >
        <nav class="navbar navbar-expand-lg bg-body-secondary ">
        <div class="container-fluid">
       <img src="images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="displayAll.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/php/Ecommerce Web/user/userRegistration.php">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="cart.php">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <sup>
                            <?php
                                cart_items();
                            ?>
                        </sup>
                    </a>
                </li> 
            </ul>
            <form class="d-flex" role="search" action="searchProducts.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-primary" name="search_data_product">
            </form>
            <ul class="navbar-nav me-2 mb-lg-0">
                <?php
                // if(!isset($_SESSION['username'])){
                //     echo"
                //     <li class='nav item'>
                //         <a class='nav-link' href='#'>Guest</a>
                //     </li>
                //     ";
                // }else{
                //     echo"
                //     <li class='nav item'>
                //         <a class='nav-link' href='#'>".$_SESSION['username']."</a>
                //     </li>
                //     ";
                // }
                //     if(!isset($_SESSION['username'])){
                //         echo"
                //         <li class='nav item'>
                //             <a class='nav-link' href='/php/Ecommerce Web/user/userLogin.php'>Login</a>
                //         </li>
                //         ";
                //     }else{
                //         echo"
                //         <li class='nav item'>
                //             <a class='nav-link' href='/php/Ecommerce Web/user/logOut.php'>Logout</a>
                //         </li>
                //         ";
                //     }
                ?>

<?php
                    if(!isset($_SESSION['username'])){
                        echo"
                        <li class='nav item'>
                            <a class='nav-link' href='./user/userLogin.php'>Login</a>
                        </li>
                        ";
                    }else{
                        echo"
                        
                            <li class='nav-item dropdown'>
                                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-bs-toggle='dropdown' aria-expanded='false'>
                                    ".$_SESSION['username']."
                                </a>
                                <ul class='dropdown-menu dropdown-menu-end' aria-labelledby='navbarDropdown'>
                                    <li><a class='dropdown-item' href='/php/Ecommerce Web/user/profile.php'>My Profile</a></li>
                                    <li><a class='dropdown-item' href='/php/Ecommerce Web/user/myOrders.php'>My Orders</a></li>
                                    <li><hr class='dropdown-divider'></li>
                                    <li><a class='dropdown-item' href='/php/Ecommerce Web/user/logOut.php'>Logout</a></li>
                                </ul>
                            </li>
                           
                        ";
                    }
                ?>
                
            </u>
            </div>
        </div>
        </nav>
     </div>


<!-- title -->
<div class="title">
    <h3 class="text-center">Hela Store</h3>
    <p class="text-center">
        Communication is the heart of ecommerce and community
    </p>
</div>

<!-- row -->
<div class="row">
    <!-- <div class="col-md-2 bg-light p-0">
        
    </div>

    <div class="col-md-10">
        
        <div class="row">

        </div>
    </div> -->

    <?php

        if(!isset($_SESSION['username'])){
            include('./user/userLogin.php');
        }else{
            include('payment.php');
        }

    ?>

    
</div>





<!-- footer-->
<?php
    include ('./includes/footer.php');
?>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>