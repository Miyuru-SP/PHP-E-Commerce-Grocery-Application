<?php
  include("..\includes\connect.php");

  if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $product_price = $_POST['product_price'];
    $product_status = 'true';
    $product_image = $_FILES['product_image']['name'];

    // temp img
    $temp_image = $_FILES['product_image']['tmp_name'];

    //check null condition
    if($product_title == '' or $description == '' or $product_keywords == '' or $product_category == '' or $product_brands == '' or $product_price =='' or $product_image == ''){
        echo "<script>alert('Please fill all the fields')</script>";
        exit();
    }else{
        move_uploaded_file($temp_image,"./productImages/$product_image");

        //insert query
        $insert_products = "INSERT into `products` (product_title, product_description, product_keyword, category_id, brand_id, product_image, product_price, date, status) VALUES ('$product_title', '$description', '$product_keywords', '$product_category', '$product_brands', '$product_image', '$product_price', NOW(), '$product_status')";

        $result_query = mysqli_query($conn, $insert_products);
        if($result_query){
            echo "<script>alert ('Successfully inserted the product')</script>";
        }
    }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products</title>
    <!-- bootstrap css  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- css -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container mt-3 ">
        <h1 class="text-center mb-5">Insert Products</h1>

        <!-- form -->
        <form action="" method="post" enctype="multipart/form-data">

            <div class="form-outline mb-4 m-auto w-50">
                <b><label for="product_title" class="form-label">Product Title</label></b>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <b><label for="product_description" class="form-label">Product Description</label></b>
                <input type="text" name="product_description" id="product_description" class="form-control" placeholder="Enter Product Description" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <b><label for="product_keywords" class="form-label">Product Keywords</label></b>
                <input type="text" name="product_keywords" id="product_keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_category" id="" class="form-select">
                    <option value="" disabled selected>Select a Category</option>

                    <?php
                        $select_query = "select * from `categories`";
                        $result_query = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $category_title = $row['category_title'];
                            $category_id = $row['category_id'];
                            echo "<option value ='$category_id'>$category_title</option>";
                        }
                    ?>

                </select>
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <select name="product_brands" id="" class="form-select">
                    <option value=""disabled selected>Select a Brand</option>

                    <?php
                        $select_query = "select * from `brands`";
                        $result_query = mysqli_query($conn, $select_query);
                        while($row = mysqli_fetch_assoc($result_query)){
                            $brand_title = $row['brand_title'];
                            $brand_id = $row['brand_id'];
                            echo "<option value ='$brand_id'>$brand_title</option>";
                        }
                    ?>

                </select>
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <b><label for="product_description" class="form-label">Product Image</label></b>
                <input type="file" name="product_image" id="product_image" class="form-control" require="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <b><label for="product_price" class="form-label">Product Price</label></b>
                <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off" required="required">
            </div>

            <div class="form-outline mb-4 m-auto w-50">
                <input type="submit" value="Insert Product" name="insert_product" class="btn btn-primary">
            </div>

        </form>

    </div>
    
</body>
</html>