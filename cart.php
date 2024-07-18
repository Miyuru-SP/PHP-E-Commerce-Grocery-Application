<?php
  include("./includes/connect.php");
  include("./functions/functions.php");
  session_start();

  function removeCartItems(){
    global $conn;
    $get_ip_add = getIPAddress();
    if(isset($_POST['remove_cart'])){
        foreach($_POST['removeitem'] as $remove_id){
            $delete_query = "DELETE FROM `cart` WHERE product_id = $remove_id AND ip_address = '$get_ip_add'";
            $run_delete = mysqli_query($conn, $delete_query);
        }
        // Check if the cart is empty
        $check_cart = "SELECT * from `cart` where ip_address = '$get_ip_add'";
        $run_check = mysqli_query($conn, $check_cart);
        if(mysqli_num_rows($run_check) == 0){
            echo "<script>
                    document.querySelector('.container').style.display = 'none';
                    document.querySelector('.text-center').innerHTML = '<h3>Your cart is empty</h3>';
                  </script>";
        } else {
            echo "<script>window.open('cart.php','_self')</script>";
        }
    }
}

function updateCartItems(){
    global $conn;
    if(isset($_POST['update_cart'])){
      $get_ip_add = getIPAddress();
      foreach($_POST['qty'] as $product_id => $quantity){
        $update_cart = "UPDATE `cart` SET quantity = $quantity WHERE product_id = $product_id AND ip_address = '$get_ip_add'";
        $result_products_qty = mysqli_query($conn, $update_cart);
      }
      echo "<script>window.open('cart.php','_self')</script>";
    }
}

// Function to calculate subtotal
function calculateSubtotal() {
    global $conn;
    $get_ip_add = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM `cart` WHERE ip_address = '$get_ip_add'";
    $result = mysqli_query($conn, $cart_query);
    while($row = mysqli_fetch_array($result)){
        $product_id = $row['product_id'];
        $quantity = $row['quantity'];
        $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
        $result_products = mysqli_query($conn, $select_products);
        while($row_product = mysqli_fetch_array($result_products)){
            $product_price = $row_product['product_price'];
            $total_price += $product_price * $quantity;
        }
    }
    return $total_price;
}

// Call functions
echo removeCartItems();
echo updateCartItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart Details</title>
  <!-- bootstrap css  -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- font awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- css -->
  <link rel="stylesheet" href="style.css">

  <style>
    .cart_image {
      width: 80px;
      height: 80px;
      object-fit: contain;
    }
        body{
            overflow-x: hidden;
        }
        .title{
            padding-top: 100px;
        }
    </style>
</head>
<body>
  <!-- navbar -->
  <div class="container-fluid p-0 fixed-top custom-navbar bg-body-secondary">
    <nav class="navbar navbar-expand-lg bg-body-secondary">
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
          </ul>
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

  <div class="container">
    <div class="row">
      <form id="cart-form" action="" method="post">
        <table class="table table-bordered text-center">
          <?php
            global $conn;
            $get_ip_add = getIPAddress();
            $cart_query = "SELECT * FROM `cart` WHERE ip_address = '$get_ip_add'";
            $result = mysqli_query($conn, $cart_query);
            $result_count = mysqli_num_rows($result);
            if($result_count > 0){
          ?>
          <thead>
            <tr>
              <th>Product Title</th>
              <th>Product Image</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Total Price</th>
              <th>Remove</th>
              <th>Update</th>
              <th>Remove</th>
            </tr>
          </thead>
          <?php
            }
          ?>
          <tbody>
            <?php
              $total_price = 0;
              while($row = mysqli_fetch_array($result)){
                $product_id = $row['product_id'];
                $quantity = $row['quantity'];
                $select_products = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                $result_products = mysqli_query($conn, $select_products);
                while($row_product = mysqli_fetch_array($result_products)){
                  $product_price = $row_product['product_price'];
                  $product_title = $row_product['product_title'];
                  $product_image = $row_product['product_image'];
                  $total_price += $product_price * $quantity;
            ?>
            <tr>
              <td><?php echo $product_title ?></td>
              <td><img src="./admin/productImages/<?php echo $product_image ?>" class="cart_image"></td>
              <td>Rs. <?php echo number_format($product_price, 2) ?></td>
              <td><input type="text" name="qty[<?php echo $product_id ?>]" value="<?php echo $quantity ?>" class="form-input" size="3"></td>
              <td>Rs. <?php echo number_format($product_price * $quantity,2)?></td>
              <td><input type="checkbox" name="removeitem[]" value="<?php echo $product_id ?>"></td>
              <td><input type="submit" value="Update" class="btn btn-warning" name="update_cart"></td>
              <td><input type="submit" value="Remove" class="btn btn-danger" name="remove_cart"></td>
            </tr>
            <?php
                }
              }
            ?>
          </tbody>
        </table>

        <?php if($result_count > 0): ?>
          <div class="d-flex mb-5">
            <h4 class="px-3">Subtotal: Rs. <strong class="text-primary"><?php echo number_format($total_price, 2) ?></strong></h4>
            <a href="index.php"><button type="button" class="px-3 py-2 border-0 mx-3 text-light btn btn-primary">Continue Shopping</button></a>
            <a href="checkout.php"><button type="button" class="px-3 py-2 border-0 text-light btn btn-success">Checkout</button></a>
          </div>
        <?php else: ?>
          <h2 class="text-center text-danger">Cart is Empty</h2>
        <?php endif; ?>

      </form>
    </div>
  </div>

  <!-- footer-->
  <?php include ('./includes/footer.php'); ?>

  <!-- bootstrap js  -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    document.getElementById('cart-form').addEventListener('submit', function(event) {
      if (event.submitter.name === 'update_cart') {
        let qtyInputs = document.querySelectorAll('input[name^="qty"]');
        let emptyQty = false;
        qtyInputs.forEach((input) => {
          if (input.value === '') {
            emptyQty = true;
          }
        });
        if (emptyQty) {
          alert('Quantity cannot be empty');
          event.preventDefault();
        }
      }

      if (event.submitter.name === 'remove_cart') {
        let checkboxes = document.querySelectorAll('input[name="removeitem[]"]');
        let checked = false;
        checkboxes.forEach((checkbox) => {
          if (checkbox.checked) {
            checked = true;
          }
        });
        if (!checked) {
          alert('Please select at least one item to remove');
          event.preventDefault();
        }
      }
    });
  </script>

</body>
</html>
