<?php
  include("includes\connect.php");
  include("functions/functions.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Details</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
     <link rel="stylesheet" href="style.css">

     <style>
        .cart_image{
            width: 80px;
            height: 80px;
            object-fit: contain;
        }
     </style>

    <!-- <script>
        function validateForm() {
            const checkboxes = document.querySelectorAll('input[name="removeitem[]"]:checked');
            if (checkboxes.length === 0) {
                alert("Please tick the checkbox before removing.");
                return false;
            }
            return true;
        }
    </script> -->

</head>
<body>
    <?php
        cart();
    ?>

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

<div class="container">
    <div class="row">
        <!-- <form action="" method="post" onsubmit="return validateForm();"> -->
        <form action="" method="post">
            <table class="table table-bordered text-center">
                <tbody>
                    <?php
                        global $conn;
                        $get_ip_add = getIPAddress();
                        $total_price = 0;
                        $cart_query = "SELECT * from `cart` where ip_address = '$get_ip_add'";
                        $result = mysqli_query($conn, $cart_query);

                        $result_count = mysqli_num_rows($result);
                        if($result_count>0){
                            echo "
                                <thead>
                                    <tr>
                                        <th>Product Title</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Total Price</th>
                                        <th>Remove</th>
                                        <th>Update</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                            ";
                        
                        while($row = mysqli_fetch_array($result)){
                            $product_id = $row['product_id'];
                            $select_products = "SELECT * from `products` where product_id = '$product_id'";
                            $result_products = mysqli_query($conn, $select_products);
                            while($row_product = mysqli_fetch_array($result_products)){
                                $product_price = $row_product['product_price'];
                                $price_table = $row_product['product_price'];
                                $product_title = $row_product['product_title'];
                                $product_image = $row_product['product_image'];
                                $total_price += $product_price;
                    ?>
                    <tr>
                        <td><?php echo $product_title ?></td>
                        <td><img src="./admin/productImages/<?php echo $product_image ?>" class='cart_image'></td>
                        <td><input type="text" name="qty" class="form-input w-50"></td>

                        <?php
                            $get_ip_add = getIPAddress();
                            if(isset($_POST['update_cart'])){
                                $quantities = $_POST['qty'];
                                $update_cart = "update `cart` set quantity = $quantities where ip_address = '$get_ip_add'";
                                $result_products_qty = mysqli_query($conn, $update_cart);
                                $total_price = $total_price * $quantities;
                            }
                        ?>

                        <td><?php echo "$product_price.00" ?></td>
                        <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
                        <td>
                            <!-- <button class="btn btn-warning">Update</button> -->
                            <input type="submit" value="Update" class="btn btn-warning" name="update_cart">
                        </td>
                        <td>
                            <!-- <button class="btn btn-danger">Remove</button> -->
                            <input type="submit" value="Remove" class="btn btn-danger" name="remove_cart">
                        </td>
                    </tr>
                    <?php
                            }
                        }
                        }else{
                            echo "<h2 class='text-center text-danger'>Cart is Empty</h2>";
                        }
                    ?>
                </tbody>
            </table>

            <div class="d-flex mb-5">

            <?php

                $get_ip_add = getIPAddress();
                $total_price = 0;
                $cart_query = "SELECT * from `cart` where ip_address = '$get_ip_add'";
                $result = mysqli_query($conn, $cart_query);

                $result_count = mysqli_num_rows($result);
                if($result_count>0){
                    echo "
                        <h4 class='px-3'>Subtotal: Rs.  
                            <strong class='text-primary'>$total_price.00 </strong>
                        </h4>
                        <a href='index.php'><button class=' px-3 py-2 border-0 mx-3 text-light btn btn-primary'>Continue Shopping</button></a>
                        <a href='#'><button class='px-3 py-2 border-0 text-light btn btn-success'>Checkout</button></a>

                    ";
                }
            
            ?>
            </div>
        </form>
    </div>
</div>

<?php

    function removeCartItems(){
        global $conn;
        if(isset($_POST['remove_cart'])){
            foreach($_POST['removeitem'] as $remove_id){
                echo $remove_id;
                $delete_query = "Delete from `cart` where product_id = $remove_id";
                $run_delete = mysqli_query($conn, $delete_query);
                if($run_delete){
                    echo "<script>window.open('cart.php','_self')</script>";
                }
            }
        }
    }
    echo $remove_items = removeCartItems();


?>


<!-- footer-->
<?php
    include ('./includes/footer.php');
?>

<!-- bootstrap js  -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
