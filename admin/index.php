<?php
  include("../includes\connect.php");
  include("../functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../style.css">

    <style>
        .admin_image{
            width: 100px;
            object-fit: contain;
        }

        .footer {
            background-color: #f8f9fa; /* Example background color */
            padding: 10px;
            text-align: center;
            width: 100%;
        }
        
        body{
            overflow-x: hidden;
        }

        .product_img{
            width:30%;
            object-fit:contain;
        }

    </style>

</head>
<body>
    <!--  -->
     <div class="container-fluid p-0">

    <!-- navbar -->
     <nav class="navbar navbar-expand-lg bg-body-secondary ">
            <div class="container-fluid">
                <a href="index.php"><img src="../images/logo.png" alt="" class="logo"></a>
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="" class="nav-link">Welcome Admin</a>
                        </li>
                        <li class="nav-item">
                            <a href="" class="nav-link">logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>

    <!-- title -->
    <div>
        <h3 class="text-center p-2">Manage Details</h3>
    </div>

    <!-- links -->
     <div class="row ">        
            <div class="button text-center">
                <a href="insertProducts.php"><button type="button" class="btn btn-primary">Insert Products</button></a>
                <a href="index.php?viewProducts"><button type="button" class="btn btn-primary">View Products</button></a>
                <a href="index.php?viewCategories"><button type="button" class="btn btn-primary">view Categories</button></a>
                <a href="index.php?viewBrands"><button type="button" class="btn btn-primary">view Brands</button></a>
                <a href="index.php?insertCategory"><button type="button" class="btn btn-primary">Insert Category</button></a>
                <a href="index.php?insertBrands"><button type="button" class="btn btn-primary">Insert Brands</button></a>
                <a href="#"><button type="button" class="btn btn-primary">All Users</button></a>
                <a href="#"><button type="button" class="btn btn-primary">All Orders</button></a>
                <a href="#"><button type="button" class="btn btn-primary">All Payments</button></a>
            </div>
     </div>

     <!-- locate pages -->
      <div class="container my-5">
        <?php
            if(isset($_GET['insertCategory'])){
                include('insertCategory.php');
            }
            if(isset($_GET['insertBrands'])){
                include('insertBrands.php');
            }
            if(isset($_GET['viewProducts'])){
                include('viewProducts.php');
            }
            if(isset($_GET['editProducts'])){
                include('editProducts.php');
            }
            if(isset($_GET['deleteProducts'])){
                include('deleteProducts.php');
            }
            if(isset($_GET['viewCategories'])){
                include('viewCategories.php');
            }
            if(isset($_GET['viewBrands'])){
                include('viewBrands.php');
            }
            if(isset($_GET['editCategories'])){
                include('editCategories.php');
            }
            if(isset($_GET['editBrands'])){
                include('editBrands.php');
            }
        ?>
      </div>

     <!-- footer-->
<?php 
    include("../includes/footer.php");
?> 


<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>