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
    <title>Edit Profile</title>
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
<!-- <div class="title">
    <h3 class="text-center">Hela Store</h3>
    <p class="text-center">
        Communication is the heart of ecommerce and community
    </p>
</div> -->

<?php
    //get user details
    global $conn;
    $username = $_SESSION['username'];
    $select_user = "SELECT * from `users` where user_name = '$username'";
    $result_user = mysqli_query($conn, $select_user);

    $row_data = mysqli_fetch_assoc($result_user);
    $user_id = $row_data['user_id'];
    $user_name = $row_data['user_name'];
    $user_email = $row_data['user_email'];
    $user_address = $row_data['user_address'];
    $user_mobile = $row_data['user_mobile'];
    $user_image = $row_data['user_image'];  

    //access changes
    if(isset($_POST['user_update'])){
        $update_id = $user_id;
        $user_name = $_POST['user_username'];
        $user_email = $_POST['user_email'];
        $user_address = $_POST['user_address'];
        $user_mobile = $_POST['user_mobile'];
        $user_image = $_FILES['user_image']['name'];
        $user_image_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($user_image_temp, "./userImages/$user_image");

        // update query
        $update_data = "update `users` set user_name = '$user_name', user_email = '$user_email', user_address = '$user_address', user_image = '$user_image', user_mobile = '$user_mobile' where user_id = $update_id";
        $result_query_update = mysqli_query($conn, $update_data);
        if($result_query_update){
            echo "<script>alert('Data updated successfully')</script>";
            echo "<script>window.open('logOut.php', '_self')</script>";
        }
    }
?>

<div class="container-fluid" style="padding-top:100px;">
    <div class="my-3 col-lg-12 col-xl-7 card mx-auto">
        <h2 class="text-center mt-3 mb-5">Edit Profile</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_username" class="col-sm-2 col-form-label">User Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_username" id="user_username" class="form-control" value="<?php echo $user_name?>" autocomplete="off">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_email" class="col-sm-2 col-form-label">Email Address</label>
                        <div class="col-sm-7">
                            <input type="email" name="user_email" id="user_email" class="form-control" value="<?php echo $user_email?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_image" class="col-sm-2 col-form-label">Profile Picture</label>
                        <div class="col-sm-7">
                            <input type="file" name="user_image" id="user_image" class="form-control"  autocomplete="off"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_address" class="col-sm-2 col-form-label">Address</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_address" id="user_address" class="form-control" value="<?php echo $user_address?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_mobile" class="col-sm-2 col-form-label">Mobile Number</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_mobile" id="user_mobile" class="form-control" value="<?php echo $user_mobile?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Update" class='btn btn-primary' name="user_update">
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>





<!-- footer-->
<?php
    include ('../includes/footer.php');
?>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>