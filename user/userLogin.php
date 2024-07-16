<?php
include_once("../includes/connect.php");
include_once("../functions/functions.php");
@session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="/php/Ecommerce Web/style.css">
</head> 
<body>
<div class="container-fluid">
    <div class="my-3 col-lg-12 col-xl-4 card mx-auto">
        <h2 class="text-center mt-3 mb-5">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-10">
                <form action="" method="post">

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_username" class="col-sm-3 col-form-label">User Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required"> 
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Login" class='btn btn-primary' name="user_login">
                        <p class="small mt-2 pt-1 mb-0">Don't have an account? 
                            <a href="/php/Ecommerce Web/user/userRegistration.php" class="text-primary">Register</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php

if(isset($_POST['user_login'])){
    $user_username = $_POST['user_username'];
    $user_password = $_POST['user_password'];

    $select_query = "select * from `users` where user_name = '$user_username'";
    $result = mysqli_query($conn, $select_query);
    $row_count = mysqli_num_rows($result);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
 
    //cart item
    $select_cart_query = "select * from `cart` where ip_address = '$user_ip'";
    $select_cart = mysqli_query($conn, $select_cart_query);
    $row_cart_count = mysqli_num_rows($select_cart );
    if($row_count>0){
        $_SESSION['username'] = $user_username;
        if(password_verify($user_password, $row_data['user_password'])){
            // echo "<script>alert('Login Successful')</script>";
            if($row_count==1 and $row_cart_count==0){
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php','_self')</script>";
            }else{
                $_SESSION['username'] = $user_username;
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('/php/Ecommerce Web/payment.php','_self')</script>";
            }
        }else{ 
            echo "<script>alert('Invalid Credentials')</script>";
        }
    }else{
        echo "<script>alert('Invalid Credentials')</script>";
    }
}

?>