<?php
include("../includes/connect.php");
include("../functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>

    <!-- bootstrap css  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../style.css">

    <style>
        body{
            overflow:hidden;
        }
    </style>
</head>
<body>
    <div class="container-fluid m-3">
        <h2 class="text-center mb-3">Admin Registration</h2>
        <div class="row d-flex justify-content-center m-auto">
            <div class="col-lg-6 col-xl-5 ml-0">
                <img src="../images/adminReg.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 col-xl-4 mx-auto mt-5">
                <form action="" method="post">
                    <div class="form-outline mb-4">
                        <label for="" class="form-label">Admin Name</label>
                        <input type="text" name="admin_name" id="admin_name" autocomplete="off" placeholder="Enter your user name" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="" class="form-label">Email Address</label>
                        <input type="email" name="admin_email" id="admin_email" autocomplete="off" placeholder="Enter your email address" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="" class="form-label">Password</label>
                        <input type="password" name="admin_password" id="admin_password" autocomplete="off" placeholder="Enter your password" required="required" class="form-control">
                    </div>
                    <div class="form-outline mb-4">
                        <label for="" class="form-label">Confirm Password</label>
                        <input type="password" name="conf_admin_password" id="conf_admin_password" autocomplete="off" placeholder="Re-enter your password" required="required" class="form-control">
                    </div>
                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Register" class='btn btn-primary' name="admin_register">
                        <p class="small mt-2 pt-1 mb-0">Already have an account? 
                            <a href="adminLogin.php" class="text-primary">Login</a>
                        </p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

<?php

if(isset($_POST['admin_register'])){
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $hash_password = password_hash($admin_password, PASSWORD_DEFAULT);
    $conf_admin_password = $_POST['conf_admin_password'];

    // Select query
    $select_query = "SELECT * FROM `admin` WHERE admin_name = '$admin_name' OR admin_email = '$admin_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);

    if($rows_count > 0){
        echo "<script>alert('Username and email already exist')</script>";
    } elseif($admin_password != $conf_admin_password){
        echo "<script>alert('Passwords do not match')</script>";
    } else {
        // Insert query
        $insert_query = "INSERT INTO `admin` (admin_name, admin_email, admin_password) VALUES ('$admin_name', '$admin_email', '$hash_password')";
        $sql_execute = mysqli_query($conn, $insert_query);

        if($sql_execute){
            echo "<script>alert('Admin registered successfully')</script>";
            echo "<script>window.open('adminLogin.php', '_self')</script>";
        } else {
            die(mysqli_error($conn));
        }
    }
}
?>
