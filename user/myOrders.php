<?php
  include("../includes\connect.php");
  include("../functions/functions.php");
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
    <link rel="stylesheet" href="../style.css">
    <style>
        body{
            overflow-x: hidden;
        }
        .title{
            padding-top: 100px;
        }
        .navbar .dropdown-menu {
            left: auto;
            right: 0;
        }
        .profile_img{
            width: 100%;
            height:100%;
        }
        .profile_img{
            max-width: 100%; /* Adjust image size to fit container */
            height: auto; /* Maintain aspect ratio */
            max-height: 200px; /* Limit maximum height if necessary */
            object-fit: contain;
        }
        .footer {
            background-color: #f8f9fa; /* Example background color */
            padding: 10px;
            text-align: center;
            width: 100%;
        }
    </style>
</head>
<body style = "overflow-x: hidden;">
    <?php
        cart();
    ?>

    <!-- navbar -->
     <div class="container-fluid p-0 fixed-top custom-navbar bg-body-secondary">
        <nav class="navbar navbar-expand-lg bg-body-secondary ">
        <div class="container-fluid">
       <img src="../images/logo.png" alt="" class="logo">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../displayAll.php">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../cart.php">
                        <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        <sup>
                            <?php
                                cart_items();
                            ?>
                        </sup>
                    </a>
                </li> 
            </ul>
            <form class="d-flex" role="search" action="../searchProducts.php" method="get">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                <input type="submit" value="Search" class="btn btn-outline-primary" name="search_data_product">
            </form>
            <ul class="navbar-nav me-2 mb-lg-0">
                
                <?php
                    if(!isset($_SESSION['username'])){
                        echo"
                        <li class='nav item'>
                            <a class='nav-link' href='userLogin.php'>Login</a>
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

<?php
function get_user_order_details(){
    global $conn;
    $username = $_SESSION['username'];
    $get_details ="Select * from `users` where user_name = '$username'";
    $result_ordd = mysqli_query($conn, $get_details);
    while($row_query = mysqli_fetch_array($result_ordd)){
        $user_id = $row_query['user_id'];
        $get_orders = "select * from `orders` where user_id = $user_id and order_status = 'pending'";
        $result_order_query = mysqli_query($conn, $get_orders);
        $row_count = mysqli_num_rows($result_order_query);
        if($row_count>0){
            echo "<h3 class='text-center mt-5'>You have <span class = 'text-danger'>$row_count</span> pending orders</h3>
            <center class='mb-5'><a href='allMyOrders.php'><button type='button' class='btn btn-primary'>View Orders</button></a></center>

            ";
            
        }else{
            echo "<h3 class='text-center mt-5 mb-3 '>You have no pending orders</h3>
            <center class='mb-5'><a href='../index.php'><button type='button' class='btn btn-primary'>Continue Shopping</button></a></center>
            ";  
        }
    }
}

?>

<div>
    <?php
        get_user_order_details();
    ?>
</div>



<!-- footer-->
<?php
    include ('../includes/footer.php');
?>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>