<?php
include("../includes/connect.php");
include("../functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="/php/Ecommerce Web/style.css">
</head> 
<body>
<div class="container-fluid">
    <div class="my-3 col-lg-12 col-xl-6 card mx-auto">
        <h2 class="text-center mt-3 mb-5">User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-10">
                <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_username" class="col-sm-3 col-form-label">User Name</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_username" id="user_username" class="form-control" placeholder="Enter your username" autocomplete="off" required="required">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_email" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_email" id="user_email" class="form-control" placeholder="Enter your email" autocomplete="off" required="required">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_image" class="col-sm-3 col-form-label">User Image</label>
                        <div class="col-sm-7">
                            <input type="file" name="user_image" id="user_image" class="form-control" autocomplete="off" required="required">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="user_password" id="user_password" class="form-control" placeholder="Enter your password" autocomplete="off" required="required"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="conf_user_password" class="col-sm-3 col-form-label">Confirm Password</label>
                        <div class="col-sm-7">
                            <input type="password" name="conf_user_password" id="conf_user_password" class="form-control" placeholder="Confirm your password" autocomplete="off" required="required"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_address" class="col-sm-3 col-form-label">Address</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_address" id="user_address" class="form-control" placeholder="Enter your address" autocomplete="off" required="required">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="user_contact" class="col-sm-3 col-form-label">Contact Number</label>
                        <div class="col-sm-7">
                            <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter your mobile number" autocomplete="off" required="required">                            
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Register" class='btn btn-primary' name="user_register">
                        <p class="small mt-2 pt-1 mb-0">Already have an account? 
                            <a href="/php/Ecommerce Web/user/userLogin.php" class="text-primary">Login</a>
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

if(isset($_POST['user_register'])){
    $user_username = $_POST['user_username'];
    $user_email = $_POST['user_email'];
    $user_password = $_POST['user_password'];
    $conf_user_password = $_POST['conf_user_password'];
    $user_address = $_POST['user_address'];
    $user_contact = $_POST['user_contact'];
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    //select query
    $select_query = "select * from `users` where user_name = '$user_username' or user_email = '$user_email'";
    $result = mysqli_query($conn, $select_query);
    $rows_count = mysqli_num_rows($result);
    if($rows_count>0){
        echo "<script>alert('Username and email already exist')</script>";
    }elseif($user_password!=$conf_user_password){
        echo "<script>alert('Password do not matched')</script>";
    }
    
    else{
        //insert query
        move_uploaded_file($user_image_tmp,"./userImages/$user_image");
        $insert_query = "insert into `users` (user_name, user_email, user_password, user_image, user_ip, user_address, user_mobile) values ('$user_username', '$user_email', '$user_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        $sql_execute = mysqli_query($conn, $insert_query);
        if($sql_execute){
            echo "<script>alert('User registered successfully')</script>";
        }else{
            die(mysqli_error($conn));
        }
        
    }


}

?>
