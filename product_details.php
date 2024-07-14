<?php
  include("includes\connect.php");
  include("functions/functions.php");
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

</head>
<body>
    <!-- navbar -->
     <div class="container-fluid p-0">
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
                    <a class="nav-link" href="#">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
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
                <li class="nav item">
                    <a class="nav-link" href="#">Guest</a>
                </li>
                <li class="nav item">
                    <a class="nav-link" href="#">Login</a>
                </li>
            </u>
            </div>
        </div>
        </nav>
     </div>


<!-- title -->
<div>
    <h3 class="text-center">Hela Store</h3>
    <p class="text-center">
        Communication is the heart of ecommerce and community
    </p>
</div>

<!-- row -->
<div class="row p-2">
    <div class="col-md-2 bg-light p-0">
        <!-- brands -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-dark bg-opacity-60">
                <a href="#" class="nav-link text-light"><h4>Delivery Brands</h4></a>
            </li>

            <?php
                getBrands()
            ?>

        </ul>
        <!-- categories -->
        <ul class="navbar-nav me-auto text-center">
            <li class="nav-item bg-dark bg-opacity-30">
                <a href="#" class="nav-link text-light"><h4>Categories</h4></a>
            </li>

            <?php
                getCategories();
            ?>
           
        </ul>

    </div>

    <div class="col-md-10">
        <!-- products -->
        <div class="row">
            <!-- card -->
            <!-- <div class="col-md-4">
                <div class='card'>
                    <img src='./images/lassi.png' class='card-img-top' alt='$product_title'>
                    <div class='card-body'>
                        <h5 class='card-title'>$product_title</h5>
                        <p class='card-text'>$product_description</p>
                        <a href='#' class='btn btn-primary'>Add to Cart</a>
                        <a href='product_details.php?category_id=$category_id' class='btn btn-dark'>View more</a>
                    </div>
                </div>
            </div> -->
             <!-- related cards  -->
            <div class="col-md-8">
                
            </div>

        <?php
            viewMoreProducts();
            getUniqueCategories();
            getUniqueBrands();
        ?>

        </div>
    </div>

    
</div>





<!-- footer-->
<?php
    include ('./includes/footer.php');
?>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>