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
