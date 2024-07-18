<?php
    if(isset($_GET['editProducts'])){
        $edit_id = $_GET['editProducts'];
        // echo $edit_id;
        $get_data = "SELECT * FROM `products` WHERE product_id = $edit_id";
        $result = mysqli_query($conn, $get_data);
        $row = mysqli_fetch_assoc($result);
        $product_title = $row['product_title'];
        // echo $product_title;
        $product_description = $row['product_description'];
        $product_keywords = $row['product_keyword'];
        $category_id = $row['category_id'];
        $brand_id = $row['brand_id'];
        $product_image = $row['product_image'];
        $product_price = $row['product_price'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products</title>
    <style>
        .product_img{
            width: 100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="my-3 col-lg-12 col-xl-7 card mx-auto">
        <h2 class="text-center mt-3 mb-5">Edit Products</h2>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-12">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_title" class="col-sm-2 col-form-label">Product Title</label>
                        <div class="col-sm-7">
                            <input type="text" name="product_title" id="product_title" class="form-control" value="<?php echo $product_title?>" autocomplete="off">                            
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-7">
                            <input type="text" name="product_description" id="product_description" class="form-control" value="<?php echo $product_description?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_keywords" class="col-sm-2 col-form-label">Keywords</label>
                        <div class="col-sm-7">
                            <input type="text" name="product_keywords" id="product_keywords" class="form-control" value="<?php echo $product_keywords?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_category" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-7">
                            <select name="product_category" id="" class="form-select">
                                <?php
                                    $select_query = "SELECT * FROM `categories`";
                                    $result_query = mysqli_query($conn, $select_query);
                                    while($row = mysqli_fetch_assoc($result_query)){
                                        $category_title = $row['category_title'];
                                        $category_id_db = $row['category_id'];
                                        $selected = ($category_id_db == $category_id) ? 'selected' : '';
                                        echo "<option value='$category_id_db' $selected>$category_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_brand" class="col-sm-2 col-form-label">Brand</label>
                        <div class="col-sm-7">
                            <select name="product_brand" id="" class="form-select">
                                <?php
                                    $select_query = "SELECT * FROM `brands`";
                                    $result_query = mysqli_query($conn, $select_query);
                                    while($row = mysqli_fetch_assoc($result_query)){
                                        $brand_title = $row['brand_title'];
                                        $brand_id_db = $row['brand_id'];
                                        $selected = ($brand_id_db == $brand_id) ? 'selected' : '';
                                        echo "<option value='$brand_id_db' $selected>$brand_title</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_image" class="col-sm-2 col-form-label">Product Image</label>
                        <div class="d-flex col-sm-7">
                            <input type="file" name="product_image" id="product_image" class="form-control" autocomplete="off"> 
                            <img src="./productImages/<?php echo $product_image?>" alt="" class="product_img">
                        </div>
                    </div>

                    <div class="form-group row mb-4 justify-content-center">
                        <label for="product_price" class="col-sm-2 col-form-label">Product Price</label>
                        <div class="col-sm-7">
                            <input type="text" name="product_price" id="product_price" class="form-control" value="<?php echo $product_price?>" autocomplete="off"> 
                        </div>
                    </div>

                    <div class="mt-5 pt-2 mb-4 text-center">
                        <input type="submit" value="Update" class='btn btn-primary' name="edit_product">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

<?php

if(isset($_POST['edit_product'])){
    $product_title = $_POST['product_title'];
    $product_description = $_POST['product_description'];
    $product_keywords = $_POST['product_keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image']['name'];
    $temp_product_image = $_FILES['product_image']['tmp_name'];

    if($product_title=='' or $product_description=='' or $product_keywords=='' or $product_category=='' or $product_brand=='' or $product_image==''){
        echo "<script>alert('Please fill all the fields and continue the process')</script>";
    }else{
        move_uploaded_file($temp_product_image,"./productImages/$product_image");

        // Update query
        $update_product = "UPDATE `products` SET product_title='$product_title', product_description='$product_description', product_keyword='$product_keywords', category_id='$product_category', brand_id='$product_brand', product_image='$product_image', product_price='$product_price', date=NOW() WHERE product_id=$edit_id";
        $result_update = mysqli_query($conn, $update_product);
        if($result_update){
            echo "<script>alert('Product updated successfully')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }
}

?>
